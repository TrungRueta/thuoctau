<?php
use App\ExtendField\ExtendField;
use App\ExtendField\ExtendFieldLang;
use App\ExtendField\ExtendFields;
use App\ExtendField\ExtendFieldType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Capsule\Manager as Capsule;

/**
 * Created by PhpStorm.
 * User: rueta
 * Date: 5/1/15
 * Time: 4:46 AM
 */

class ExtendFieldTableSeeder extends Seeder {

    /**
     *
     */
    public function run() {

        Capsule::table('extend_field')->delete();
        Capsule::table('extend_field_lang')->delete();
        Capsule::table('extend_fields')->delete();

        // extend field
        ExtendField::create([
            'id_extend_field' => 1,
            'name' => 'blend-type',
            'type' => 6,
            'description' => '',
            'parent' => 'blends',
            'id_parent' => 0,
            'ordering' => 0,
            'translated' => 0,
            'value' => 'unknown:Unknown
                american:American
                aromatic:Aromatic
                balkan:Balkan
                burley-based:Burley Based
                cavendish-based:Cavendish Based
                cigar-leaf-based:Cigar Leaf Based
                english:English
                oriental:Oriental
                other:Other
                scottish:Scottish
                straight-virginia:Straight Virginia
                virginia-based:Virginia Based
                virginia-burley:Virginia/Burley
                virginia-latakia:Virginia/Latakia
                virginia-perique:Virginia/Perique',
            'default_value' => 'aromatic',
            'global' => '0',
            'main' => '0',
        ]);

        ExtendField::create([
            'id_extend_field' => 2,
            'name' => 'contents',
            'type' => 2,
            'description' => '',
            'parent' => 'blends',
            'id_parent' => 0,
            'ordering' => 0,
            'translated' => 0,
            'value' => '',
            'default_value' => 'Black Cavendish, Cavendish, Virginia',
            'global' => '0',
            'main' => '0',
        ]);

        ExtendField::create([
            'id_extend_field' => 3,
            'name' => 'flavors',
            'type' => 6,
            'description' => '',
            'parent' => 'blends',
            'id_parent' => 0,
            'ordering' => 0,
            'translated' => 0,
            'value' => 'none:None
                alcohol-liquor:Alcohol / Liquor
                almond:Almond
                amaretto:Amaretto
                anisette:Anisette
                apple:Apple
                apricot:Apricot
                blackberry:Blackberry
                blackcurrant:Blackcurrant
                bourbon:Bourbon
                brandy:Brandy
                butter:Butter
                calvados:Calvados
                caramel:Caramel
                cherry:Cherry
                cinnamon:Cinnamon
                cocco:Cocco
                cocoa-chocolate:Cocoa / Chocolate
                coffee:Coffee
                cognac:Cognac
                cream:Cream
                deer-tongue:Deer Tongue
                figs:Figs
                floral-essences:Floral Essences
                fruit-citrus:Fruit / Citrus
                ginger:Ginger
                honey:Honey
                irish-mist:Irish Mist
                kirsch:Kirsch
                licorice:Licorice
                mango:Mango
                maple:Maple
                menthol:Menthol
                mint:Mint
                molasses:Molasses
                nougat:Nougat
                nuts-beans:Nuts / Beans
                orange:Orange
                other-misc:Other Misc
                peach:Peach
                pecan:Pecan
                pineapple:Pineapple
                pistachio:Pistachio
                plum:Plum
                pomegranate:Pomegranate
                raspberry:Raspberry
                rum:Rum
                sherry:Sherry
                spices:Spices
                sweet-sugar:Sweet / Sugar
                tonquin-bean:Tonquin Bean
                vanilla:Vanilla
                walnut:Walnut
                whisky:Whisky',
            'default_value' => '',
            'global' => '0',
            'main' => '0',
        ]);

        ExtendField::create([
            'id_extend_field' => 4,
            'name' => 'cuts',
            'type' => 6,
            'description' => '',
            'parent' => 'blends',
            'id_parent' => 0,
            'ordering' => 0,
            'translated' => 0,
            'value' => 'broken-flake:Broken Flake
                coarse-cut:Coarse Cut
                cube:Cube
                curly-cut:Curly Cut
                flake:Flake
                krumble-kake:Krumble Kake
                plug:Plug
                ready-rubbed:Ready Rubbed
                ribbon:Ribbon
                rope:Rope
                shag:Shag',
            'default_value' => '',
            'global' => '0',
            'main' => '0',
        ]);

        ExtendField::create([
            'id_extend_field' => 5,
            'name' => 'packaging',
            'type' => 6,
            'description' => '',
            'parent' => 'blends',
            'id_parent' => 0,
            'ordering' => 0,
            'translated' => 0,
            'value' => 'all:All
                tin:Tin
                pouch:Pouch
                bulk:Bulk',
            'default_value' => 'all',
            'global' => '0',
            'main' => '0',
        ]);

        ExtendField::create([
            'id_extend_field' => 6,
            'name' => 'avg.-strength',
            'type' => 6,
            'description' => '',
            'parent' => 'blends',
            'id_parent' => 0,
            'ordering' => 0,
            'translated' => 0,
            'value' => 'extremely-mild:Extremely Mild
                very-mild:Very Mild
                mild:Mild
                mild-to-medium:Mild to Medium
                medium:Medium
                medium-to-strong:Medium to Strong
                strong:Strong
                very-strong:Very Strong
                extremely-strong:Extremely Strong
                overwhelming:Overwhelming',
            'default_value' => '',
            'global' => '0',
            'main' => '0',
        ]);

        ExtendField::create([
            'id_extend_field' => 7,
            'name' => 'avg.-flavoring',
            'type' => 6,
            'description' => '',
            'parent' => 'blends',
            'id_parent' => 0,
            'ordering' => 0,
            'translated' => 0,
            'value' => 'none-detected:None Detected
                extremely-mild:Extremely Mild
                very-mild:Very Mild
                mild:Mild
                mild-to-medium:Mild to Medium
                medium:Medium
                medium-to-strong:Medium to Strong
                strong:Strong
                very-strong:Very Strong
                extra-strong:Extra Strong',
            'default_value' => 'none-detected',
            'global' => '0',
            'main' => '0',
        ]);

        ExtendField::create([
            'id_extend_field' => 8,
            'name' => 'avg.-taste',
            'type' => 6,
            'description' => '',
            'parent' => 'blends',
            'id_parent' => 0,
            'ordering' => 0,
            'translated' => 0,
            'value' => 'extremely-mild-flat:Extremely Mild (Flat)
                very-mild:Very Mild
                mild:Mild
                mild-to-medium:Mild to Medium
                medium:Medium
                medium-to-full:Medium to Full
                full:Full
                very-full:Very Full
                extra-full:Extra Full
                overwhelming:Overwhelming',
            'default_value' => 'none-detected',
            'global' => '0',
            'main' => '0',
        ]);


        ExtendField::create([
            'id_extend_field' => 9,
            'name' => 'avg.-room-note',
            'type' => 6,
            'description' => '',
            'parent' => 'blends',
            'id_parent' => 0,
            'ordering' => 0,
            'translated' => 0,
            'value' => 'unnoticeable:Unnoticeable
                very-pleasant:Very Pleasant
                pleasant:Pleasant
                pleasant-to-tolerable:Pleasant to Tolerable
                tolerable:Tolerable
                tolerable-to-strong:Tolerable to Strong
                strong:Strong
                very-strong:Very Strong
                extra-strong:Extra Strong
                overwhelming:Overwhelming',
            'default_value' => 'none-detected',
            'global' => '0',
            'main' => '0',
        ]);

        ExtendField::create([
            'id_extend_field' => 10,
            'name' => 'avg.-rating',
            'type' => 6,
            'description' => '',
            'parent' => 'blends',
            'id_parent' => 0,
            'ordering' => 0,
            'translated' => 0,
            'value' => 'highly-recommended:Highly Recommended
                recommended:Recommended
                somewhat-recommended:Somewhat Recommended
                not-recommended:Not Recommended',
            'default_value' => '',
            'global' => '0',
            'main' => '0',
        ]);


        // EXTEND FIELD LANG

        ExtendFieldLang::create([
            'id_extend_field' => 1,
            'lang' => 'en',
            'label' => 'Blend Type'
        ]);

        ExtendFieldLang::create([
            'id_extend_field' => 2,
            'lang' => 'en',
            'label' => 'Contents'
        ]);

        ExtendFieldLang::create([
            'id_extend_field' => 3,
            'lang' => 'en',
            'label' => 'Flavors'
        ]);

        ExtendFieldLang::create([
            'id_extend_field' => 4,
            'lang' => 'en',
            'label' => 'Cuts'
        ]);

        ExtendFieldLang::create([
            'id_extend_field' => 5,
            'lang' => 'en',
            'label' => 'Packaging'
        ]);

        ExtendFieldLang::create([
            'id_extend_field' => 6,
            'lang' => 'en',
            'label' => 'Avg. Strength'
        ]);

        ExtendFieldLang::create([
            'id_extend_field' => 7,
            'lang' => 'en',
            'label' => 'Avg. Flavoring'
        ]);

        ExtendFieldLang::create([
            'id_extend_field' => 8,
            'lang' => 'en',
            'label' => 'Avg. Taste'
        ]);

        ExtendFieldLang::create([
            'id_extend_field' => 9,
            'lang' => 'en',
            'label' => 'Avg. Room Note'
        ]);

        ExtendFieldLang::create([
            'id_extend_field' => 10,
            'lang' => 'en',
            'label' => 'Avg. Rating'
        ]);

        ExtendFieldLang::create([
            'id_extend_field' => 11,
            'lang' => 'en',
            'label' => 'Test'
        ]);


        // extend fields
        ExtendFields::create([
            'id_extend_fields' => 1,
            'id_extend_field' => 1,
            'parent' => 'blends',
            'id_parent' => 1,
            'lang' => '',
            'content' => 'other',
            'ordering' => '0'
        ]);

        ExtendFields::create([
            'id_extend_fields' => 2,
            'id_extend_field' => 2,
            'parent' => 'blends',
            'id_parent' => 1,
            'lang' => '',
            'content' => 'Black Cavendish, Cavendish, Virginia',
            'ordering' => '0'
        ]);

        ExtendFields::create([
            'id_extend_fields' => 3,
            'id_extend_field' => 3,
            'parent' => 'blends',
            'id_parent' => 1,
            'lang' => '',
            'content' => 'none',
            'ordering' => '0'
        ]);

        ExtendFields::create([
            'id_extend_fields' => 4,
            'id_extend_field' => 4,
            'parent' => 'blends',
            'id_parent' => 1,
            'lang' => '',
            'content' => 'broken-flake',
            'ordering' => '0'
        ]);

        ExtendFields::create([
            'id_extend_fields' => 5,
            'id_extend_field' => 5,
            'parent' => 'blends',
            'id_parent' => 1,
            'lang' => '',
            'content' => 'all',
            'ordering' => '0'
        ]);

        ExtendFields::create([
            'id_extend_fields' => 6,
            'id_extend_field' => 6,
            'parent' => 'blends',
            'id_parent' => 1,
            'lang' => '',
            'content' => 'extremely-mild',
            'ordering' => '0'
        ]);

        ExtendFields::create([
            'id_extend_fields' => 7,
            'id_extend_field' => 7,
            'parent' => 'blends',
            'id_parent' => 1,
            'lang' => '',
            'content' => 'none-detected',
            'ordering' => '0'
        ]);

        ExtendFields::create([
            'id_extend_fields' => 8,
            'id_extend_field' => 8,
            'parent' => 'blends',
            'id_parent' => 1,
            'lang' => '',
            'content' => 'extremely-mild-flat',
            'ordering' => '0'
        ]);

        ExtendFields::create([
            'id_extend_fields' => 9,
            'id_extend_field' => 9,
            'parent' => 'blends',
            'id_parent' => 1,
            'lang' => '',
            'content' => 'unnoticeable',
            'ordering' => '0'
        ]);

        ExtendFields::create([
            'id_extend_fields' => 10,
            'id_extend_field' => 10,
            'parent' => 'blends',
            'id_parent' => 1,
            'lang' => '',
            'content' => 'highly-recommended',
            'ordering' => '0'
        ]);
    }

}