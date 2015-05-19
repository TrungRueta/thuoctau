<?php

use Assetic\AssetManager;
use Assetic\AssetWriter;
use Assetic\Factory\AssetFactory;
use Assetic\Factory\Worker\CacheBustingWorker;
use Assetic\Filter\CssRewriteFilter;
use Assetic\FilterManager;

/**
 * @property CI_Controller ci
 */
class Assetic {


    /*public static function __callStatic($name, $arguments)
    {
        $instance = new static;
        return call_user_func_array(array($instance, $name), $arguments);
    }*/


    /**
     * @param $configFile
     * @param $pathAsset
     * @param bool $force
     * @param bool $render
     * @return null
     */
    public function buildAsset($configFile, $pathAsset, $force=false, $render=false)
    {

        //place this before any script you want to calculate time
        //$time_start = microtime(true);

        // create File class
        //$file = new Filesystem();
        // parse json config file
        //$assetArray = json_decode($file->get(public_path($configFile)));
        /** @var string.php $configFile */

        if (!defined('FCPATH')) define('FCPATH', __DIR__ . '/../..');

        $assetArray = include( FCPATH . $pathAsset . '/' . $configFile);

        // get dependencies
        $dependencies = $assetArray['dependencies'];
        //root folder ( inside json config file )
        $base = $assetArray['base'];
        // export page
        $exportPath = $assetArray['export'];
        // name ui file
        $uiName = $assetArray['uiName'];
        // name ux file
        $uxName = $assetArray['uxName'];

        // common object for ux & ui
        // ui list (css | less)
        $uiList = [];
        $uxList = [];

        // insert UX & UI into filter object
        foreach ($dependencies as $name => $plugin) {
            // convert to object to easy
            $plugin = (object)$plugin;

            if (isset($plugin->css)) {
                if (is_array($plugin->css)) {
                    foreach ($plugin->css as $r => $css) {
                        self::parsePaths($base, $name . '-' . $r, $plugin, $css, null, $uiList, $uxList);
                    }
                } else self::parsePaths($base, $name, $plugin, $plugin->css, null, $uiList, $uxList);
            }

            if (isset($plugin->js)) {
                if (is_array($plugin->js)) {
                    foreach ($plugin->js as $r => $js) {
                        self::parsePaths($base, $name . '-' . $r, $plugin, null, $js, $uiList, $uxList);
                    }
                } else self::parsePaths($base, $name, $plugin, null, $plugin->js, $uiList, $uxList);
            }
        }

        // if debug = true ~> add script tag
        //// if debug = false
        if ($force == true || $render == true) {

            //// render if has paramete url
            if ($render == true) {

                // minify
                // create ui asset manager
                $ui = new AssetManager();
                $ux = new AssetManager();
                $factory = new AssetFactory($pathAsset);

                $filter = new FilterManager();
                $filter->set('rewriteUrl', new CssRewriteFilter());

                $factory->setFilterManager($filter);
                $factory->addWorker(new CacheBustingWorker());

                $factory->setAssetManager($ui);

                $pathsUi = [];
                foreach ($uiList as $file) $pathsUi[] = FCPATH . '/' . $file['path'];
                $pathsUx = [];
                foreach ($uxList as $file) $pathsUx[] = FCPATH . '/' . $file['path'];

                $factory->setAssetManager($ux);

                $uiParse = $factory->createAsset($pathsUi, ['rewriteUrl']);
                $uiParse->setTargetPath($uiName . '.css');

                $uxParse = $factory->createAsset($pathsUx, []);
                $uxParse->setTargetPath($uxName . '.js');

                $writer = new AssetWriter($pathAsset . '/' . $exportPath);

                $writer->writeAsset($uiParse);
                $writer->writeAsset($uxParse);

                // gzip minify
                $this->gzCompressFile($pathAsset . '/' . $exportPath . '/' . $uiName . '.css');
                $this->gzCompressFile($pathAsset . '/' . $exportPath . '/' . $uxName . '.js');
            }

            // fill html tag
            echo '<link type="text/css" rel="stylesheet" href="/' . $exportPath . '/' . $uiName . '.css' . '"/>';
            echo '<script type="text/javascript" src="/' . $exportPath . '/' . $uxName . '.js' . '"></script>';
        }
        //
        else {
            foreach ($uiList as $ob) {
                $path = [];
                $path[] = $ob['path'];

                // glob check file
                if (strpos($path[0], '*') != false) {
                    $path = glob($pathAsset . $path[0]);
                }

                foreach ($path as $f) {
                    $filepath = str_replace($pathAsset, '', $f);
                    if ($ob['less'] == true)
                        echo '<link type="text/css" rel="stylesheet/less" href="' . $filepath . '"/>';
                    else
                        echo '<link type="text/css" rel="stylesheet" href="' . $filepath . '"/>';
                }
            }

            foreach ($uxList as $ob) {
                $path = [];
                $path[] = $ob['path'];

                // glob check file
                if ($ob['glob'] == true) {
                    $path = glob($pathAsset . '/' . $path[0]);
                }

                foreach ($path as $f) {
                    $filepath = str_replace($pathAsset, '', $f);
                    echo '<script type="text/javascript" src="' . $filepath . '"></script>';
                }
            }
        }


        //$time_end = microtime(true);


        //$execution_time = round($time_end - $time_start, 2);

        //execution time of the script
        //echo '<b>Total Execution Time:</b> '.$execution_time.' Mins';
        //echo ($execution_time * 1000 . ' ms');

        return null;
    }

    public function gzCompressFile($source, $level = 9){
        $dest = $source . '.gz';
        $mode = 'wb' . $level;
        $error = false;
        if ($fp_out = gzopen($dest, $mode)) {
            if ($fp_in = fopen($source,'rb')) {
                while (!feof($fp_in))
                    gzwrite($fp_out, fread($fp_in, 1024 * 512));
                fclose($fp_in);
            } else {
                $error = true;
            }
            gzclose($fp_out);
        } else {
            $error = true;
        }
        if ($error)
            return false;
        else
            return $dest;
    }

    // FUNCTION: parse data and filter UI (css|less) and UX (js)
    public function parsePaths($base, $name, $plugin, $css = null, $js = null, &$uiList, &$uxList)
    {

        if (!is_null($css)) {
            // loop if $part UI or $part UX is array
            $pathUi = (isset($plugin->css)) ? (strlen($base) > 0 ? $base . '/' : '') . $plugin->folder . '/' . $css : null;
            // check if exist [*] ~> mark need use glob
            $globUi = (strpos($pathUi, '*') != false);
            // if config dev then not include on real
            $dev = (isset($plugin->dev) && $plugin->dev == true);
            // check less
            $less = (isset($plugin->less) && $plugin->less == true);
            if (!is_null($pathUi))
                $uiList[] = ["path" => $pathUi, "glob" => $globUi, "dev" => $dev, "less" => $less, "name" => $name];
        }

        if (!is_null($js)) {
            $pathUx = (isset($plugin->js)) ? ( strlen($base) > 0 ? $base . '/' : '' ) . $plugin->folder . '/' . $js : null;
            $globUx = (strpos($pathUx, '*') != false);
            // if config dev then not include on real
            $dev = (isset($plugin->dev) && $plugin->dev == true);
            if (!is_null($pathUx))
                $uxList[] = ["path" => $pathUx, "glob" => $globUx, "dev" => $dev, "name" => $name];
        }
    }

}