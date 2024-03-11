<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HistoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('histories')->delete();
        
        \DB::table('histories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'model' => 'all',
                'action' => 'VERSION',
                'user_id' => '1',
                'old_values' => '0.5',
                'new_values' => '0.6',
                'created_at' => '2023-10-02 18:48:26',
                'updated_at' => '2023-10-02 18:48:26',
            ),
            1 => 
            array (
                'id' => 2,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'brand\',odoo_name: \'\',comment: \'<p>Product brand This name has to be the one of the brand, but not the one of company or distributor Exemple : "Duotone" but not "Boards and More".</p>\',required: \'1\',attribute_list_id: \'3\',unit_id: \'\',data_type_id: \'1\',sort: \'1\'',
                'new_values' => 'name: \'brand\',odoo_name: \'\',comment: \'<p>Product brand This name has to be the one of the brand, but not the one of company or distributor Exemple : "Duotone" but not "Boards and More".</p>\',required: \'1\',attribute_list_id: \'3\',unit_id: \'\',data_type_id: \'1\',sort: \'1\'',
                'created_at' => '2024-03-11 13:49:04',
                'updated_at' => '2024-03-11 13:49:04',
            ),
            2 => 
            array (
                'id' => 3,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'supplier\',odoo_name: \'\',comment: \'<p>name of the supplier company</p>\',required: \'1\',attribute_list_id: \'9\',unit_id: \'\',data_type_id: \'1\',sort: \'2\'',
                'new_values' => 'name: \'supplier\',odoo_name: \'\',comment: \'<p>name of the supplier company</p>\',required: \'1\',attribute_list_id: \'9\',unit_id: \'\',data_type_id: \'1\',sort: \'2\'',
                'created_at' => '2024-03-11 13:49:04',
                'updated_at' => '2024-03-11 13:49:04',
            ),
            3 => 
            array (
                'id' => 4,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'sku\',odoo_name: \'\',comment: \'SKU code : unique identifier for one product variant for brand internal use.
This code has to be unique for one product, and has to change each time the product is changing technically (even if only graphics).
It will be used by programs for price updates\',required: \'1\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'2\',sort: \'4\'',
                'new_values' => 'name: \'sku\',odoo_name: \'\',comment: \'SKU code : unique identifier for one product variant for brand internal use.
This code has to be unique for one product, and has to change each time the product is changing technically (even if only graphics).
It will be used by programs for price updates\',required: \'1\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'2\',sort: \'3\'',
                'created_at' => '2024-03-11 13:49:04',
                'updated_at' => '2024-03-11 13:49:04',
            ),
            4 => 
            array (
                'id' => 5,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'name\',odoo_name: \'\',comment: \'Name : official name for trade. Should be as short as possible.
Doesn\'t contain other information that can be found is specialized attribute, like variant data, brand name of year.
For a tee shirt, available in 3 colors and 4 sizes, this will be for exemple : "BRADFORD", and variants data will complete with size and color
For a tee shirt, available in only one colors and 4 sizes, this will be for exemple : "BRADFORD RED", and variants data will complete with size
In both case, the name in not containing the category ("TEE") or brand ("PICTURE").\',required: \'1\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'2\',sort: \'6\'',
                'new_values' => 'name: \'name\',odoo_name: \'\',comment: \'Name : official name for trade. Should be as short as possible.
Doesn\'t contain other information that can be found is specialized attribute, like variant data, brand name of year.
For a tee shirt, available in 3 colors and 4 sizes, this will be for exemple : "BRADFORD", and variants data will complete with size and color
For a tee shirt, available in only one colors and 4 sizes, this will be for exemple : "BRADFORD RED", and variants data will complete with size
In both case, the name in not containing the category ("TEE") or brand ("PICTURE").\',required: \'1\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'2\',sort: \'4\'',
                'created_at' => '2024-03-11 13:49:04',
                'updated_at' => '2024-03-11 13:49:04',
            ),
            5 => 
            array (
                'id' => 6,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'category\',odoo_name: \'\',comment: \'Commercial category for product classification\',required: \'1\',attribute_list_id: \'2\',unit_id: \'\',data_type_id: \'1\',sort: \'7\'',
                'new_values' => 'name: \'category\',odoo_name: \'\',comment: \'Commercial category for product classification\',required: \'1\',attribute_list_id: \'2\',unit_id: \'\',data_type_id: \'1\',sort: \'5\'',
                'created_at' => '2024-03-11 13:49:04',
                'updated_at' => '2024-03-11 13:49:04',
            ),
            6 => 
            array (
                'id' => 7,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'wholesale-price\',odoo_name: \'\',comment: \'Wholesale Price : Standard purchase price excuding VAT.
This does not include any discount (like volume discount, year discount, client specific discount).\',required: \'1\',attribute_list_id: \'\',unit_id: \'16\',data_type_id: \'6\',sort: \'11\'',
                'new_values' => 'name: \'wholesale-price\',odoo_name: \'\',comment: \'Wholesale Price : Standard purchase price excuding VAT.
This does not include any discount (like volume discount, year discount, client specific discount).\',required: \'1\',attribute_list_id: \'\',unit_id: \'16\',data_type_id: \'6\',sort: \'6\'',
                'created_at' => '2024-03-11 13:49:04',
                'updated_at' => '2024-03-11 13:49:04',
            ),
            7 => 
            array (
                'id' => 8,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'retail-price\',odoo_name: \'\',comment: \'Retail Price : Recommanded retail price including VAT\',required: \'1\',attribute_list_id: \'\',unit_id: \'16\',data_type_id: \'6\',sort: \'12\'',
                'new_values' => 'name: \'retail-price\',odoo_name: \'\',comment: \'Retail Price : Recommanded retail price including VAT\',required: \'1\',attribute_list_id: \'\',unit_id: \'16\',data_type_id: \'6\',sort: \'7\'',
                'created_at' => '2024-03-11 13:49:04',
                'updated_at' => '2024-03-11 13:49:04',
            ),
            8 => 
            array (
                'id' => 9,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'weight\',odoo_name: \'\',comment: \'Weight of the whole product, for logistic purpose\',required: \'1\',attribute_list_id: \'\',unit_id: \'5\',data_type_id: \'5\',sort: \'15\'',
                'new_values' => 'name: \'weight\',odoo_name: \'\',comment: \'Weight of the whole product, for logistic purpose\',required: \'1\',attribute_list_id: \'\',unit_id: \'5\',data_type_id: \'5\',sort: \'8\'',
                'created_at' => '2024-03-11 13:49:04',
                'updated_at' => '2024-03-11 13:49:04',
            ),
            9 => 
            array (
                'id' => 10,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'ean\',odoo_name: \'\',comment: \'EAN code : unique identifier for one product variant delivered by GS1 autority or similar\',required: \'0\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'2\',sort: \'5\'',
                'new_values' => 'name: \'ean\',odoo_name: \'\',comment: \'EAN code : unique identifier for one product variant delivered by GS1 autority or similar\',required: \'\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'2\',sort: \'9\'',
                'created_at' => '2024-03-11 13:49:04',
                'updated_at' => '2024-03-11 13:49:04',
            ),
            10 => 
            array (
                'id' => 11,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'season\',odoo_name: \'\',comment: \'<p>Year validity for the product, for the case where this product is specific to one season. This has to be a year like 2023. We suggest that this should be the last year of validity (ie. 2024 for a 23-24 winter season product)</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'9\',sort: \'3\'',
            'new_values' => 'name: \'season\',odoo_name: \'\',comment: \'<p>Year validity for the product, for the case where this product is specific to one season. This has to be a year like 2023. We suggest that this should be the last year of validity (ie. 2024 for a 23-24 winter season product)</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'9\',sort: \'10\'',
                'created_at' => '2024-03-11 13:49:04',
                'updated_at' => '2024-03-11 13:49:04',
            ),
            11 => 
            array (
                'id' => 12,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'description-long-fr\',odoo_name: \'\',comment: \'Description longue en Français : description marketing complète du produit, à destination des sites web. Peut contenir un formatage HTML basique.\',required: \'0\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'7\',sort: \'8\'',
                'new_values' => 'name: \'description-long-fr\',odoo_name: \'\',comment: \'Description longue en Français : description marketing complète du produit, à destination des sites web. Peut contenir un formatage HTML basique.\',required: \'\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'7\',sort: \'11\'',
                'created_at' => '2024-03-11 13:49:04',
                'updated_at' => '2024-03-11 13:49:04',
            ),
            12 => 
            array (
                'id' => 13,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'description-short-fr\',odoo_name: \'\',comment: \'Description courte en Français : description marketing résumée du produit, idéalement une 15aine de mots maximum\',required: \'0\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'7\',sort: \'9\'',
                'new_values' => 'name: \'description-short-fr\',odoo_name: \'\',comment: \'Description courte en Français : description marketing résumée du produit, idéalement une 15aine de mots maximum\',required: \'\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'7\',sort: \'12\'',
                'created_at' => '2024-03-11 13:49:04',
                'updated_at' => '2024-03-11 13:49:04',
            ),
            13 => 
            array (
                'id' => 14,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'pictures\',odoo_name: \'\',comment: \'<p>Product picture links, semicolon separated, no space or special character except _ and -, most important first. We suggest that picture should be square aspect, at least 800x800px, white background, jpeg format. We suggest that picture should be stored on a cnd, so that processing programs could upload them automatically.</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'8\',sort: \'10\'',
                'new_values' => 'name: \'pictures\',odoo_name: \'\',comment: \'<p>Product picture links, semicolon separated, no space or special character except _ and -, most important first. We suggest that picture should be square aspect, at least 800x800px, white background, jpeg format. We suggest that picture should be stored on a cnd, so that processing programs could upload them automatically.</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'8\',sort: \'13\'',
                'created_at' => '2024-03-11 13:49:04',
                'updated_at' => '2024-03-11 13:49:04',
            ),
            14 => 
            array (
                'id' => 15,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'uom\',odoo_name: \'\',comment: \'Tells how product quantity is managed in stock (unit if not defined)\',required: \'0\',attribute_list_id: \'8\',unit_id: \'\',data_type_id: \'1\',sort: \'13\'',
            'new_values' => 'name: \'uom\',odoo_name: \'\',comment: \'Tells how product quantity is managed in stock (unit if not defined)\',required: \'\',attribute_list_id: \'8\',unit_id: \'\',data_type_id: \'1\',sort: \'14\'',
                'created_at' => '2024-03-11 13:49:04',
                'updated_at' => '2024-03-11 13:49:04',
            ),
            15 => 
            array (
                'id' => 16,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'logistic-qty\',odoo_name: \'\',comment: \'tells how is handled product from logistics
if uom is "package", quantity in each package
id uom us "unit", quantity by carton\',required: \'0\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'4\',sort: \'14\'',
                'new_values' => 'name: \'logistic-qty\',odoo_name: \'\',comment: \'tells how is handled product from logistics
if uom is "package", quantity in each package
id uom us "unit", quantity by carton\',required: \'\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'4\',sort: \'15\'',
                'created_at' => '2024-03-11 13:49:04',
                'updated_at' => '2024-03-11 13:49:04',
            ),
            16 => 
            array (
                'id' => 17,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'size-1\',odoo_name: \'\',comment: \'Lenght for logistic purpose\',required: \'0\',attribute_list_id: \'\',unit_id: \'2\',data_type_id: \'5\',sort: \'16\'',
                'new_values' => 'name: \'size-1\',odoo_name: \'\',comment: \'Lenght for logistic purpose\',required: \'\',attribute_list_id: \'\',unit_id: \'2\',data_type_id: \'5\',sort: \'16\'',
                'created_at' => '2024-03-11 13:49:04',
                'updated_at' => '2024-03-11 13:49:04',
            ),
            17 => 
            array (
                'id' => 18,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'size-2\',odoo_name: \'\',comment: \'Wide for logistic purpose\',required: \'0\',attribute_list_id: \'\',unit_id: \'2\',data_type_id: \'5\',sort: \'17\'',
                'new_values' => 'name: \'size-2\',odoo_name: \'\',comment: \'Wide for logistic purpose\',required: \'\',attribute_list_id: \'\',unit_id: \'2\',data_type_id: \'5\',sort: \'17\'',
                'created_at' => '2024-03-11 13:49:04',
                'updated_at' => '2024-03-11 13:49:04',
            ),
            18 => 
            array (
                'id' => 19,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'size-3\',odoo_name: \'\',comment: \'Height for logistic purpose\',required: \'0\',attribute_list_id: \'\',unit_id: \'2\',data_type_id: \'5\',sort: \'18\'',
                'new_values' => 'name: \'size-3\',odoo_name: \'\',comment: \'Height for logistic purpose\',required: \'\',attribute_list_id: \'\',unit_id: \'2\',data_type_id: \'5\',sort: \'18\'',
                'created_at' => '2024-03-11 13:49:04',
                'updated_at' => '2024-03-11 13:49:04',
            ),
            19 => 
            array (
                'id' => 20,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'discount-b2c\',odoo_name: \'\',comment: \'Discounted suggested retail price including VAT.
Mainly used for price update during promotional periods.\',required: \'0\',attribute_list_id: \'\',unit_id: \'16\',data_type_id: \'6\',sort: \'19\'',
                'new_values' => 'name: \'discount-b2c\',odoo_name: \'\',comment: \'Discounted suggested retail price including VAT.
Mainly used for price update during promotional periods.\',required: \'\',attribute_list_id: \'\',unit_id: \'16\',data_type_id: \'6\',sort: \'19\'',
                'created_at' => '2024-03-11 13:49:04',
                'updated_at' => '2024-03-11 13:49:04',
            ),
            20 => 
            array (
                'id' => 21,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'discount-b2b-pc\',odoo_name: \'\',comment: \'<p>Discounted percent on b2b price excluding VAT. This can be used to store client specific discount, volume discount, year discount etc.</p><p>Used if discount-b2b is not filled</p><p>1.0 is for 100% discount, 0.2 is for 20% discount</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'5\',sort: \'20\'',
                'new_values' => 'name: \'discount-b2b-pc\',odoo_name: \'\',comment: \'<p>Discounted percent on b2b price excluding VAT. This can be used to store client specific discount, volume discount, year discount etc.</p><p>Used if discount-b2b is not filled</p><p>1.0 is for 100% discount, 0.2 is for 20% discount</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'5\',sort: \'20\'',
                'created_at' => '2024-03-11 13:49:04',
                'updated_at' => '2024-03-11 13:49:04',
            ),
            21 => 
            array (
                'id' => 22,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'discount-b2b\',odoo_name: \'\',comment: \'Discounted b2b price excluding VAT.
This can be used to store client specific discount, volume discount, year discount etc.\',required: \'0\',attribute_list_id: \'\',unit_id: \'16\',data_type_id: \'6\',sort: \'21\'',
                'new_values' => 'name: \'discount-b2b\',odoo_name: \'\',comment: \'Discounted b2b price excluding VAT.
This can be used to store client specific discount, volume discount, year discount etc.\',required: \'\',attribute_list_id: \'\',unit_id: \'16\',data_type_id: \'6\',sort: \'21\'',
                'created_at' => '2024-03-11 13:49:04',
                'updated_at' => '2024-03-11 13:49:04',
            ),
            22 => 
            array (
                'id' => 23,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'var-size-m\',odoo_name: \'Taille (m)\',comment: \'<p>Size in Meters. Variant index attribute</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'2\',data_type_id: \'5\',sort: \'22\'',
            'new_values' => 'name: \'var-size-m\',odoo_name: \'Taille (m)\',comment: \'<p>Size in Meters. Variant index attribute</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'2\',data_type_id: \'5\',sort: \'22\'',
                'created_at' => '2024-03-11 13:49:04',
                'updated_at' => '2024-03-11 13:49:04',
            ),
            23 => 
            array (
                'id' => 24,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'var-size-cm\',odoo_name: \'Taille (cm)\',comment: \'<p>Size in Centimeter - Variant index attribute</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'3\',data_type_id: \'5\',sort: \'23\'',
            'new_values' => 'name: \'var-size-cm\',odoo_name: \'Taille (cm)\',comment: \'<p>Size in Centimeter - Variant index attribute</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'3\',data_type_id: \'5\',sort: \'23\'',
                'created_at' => '2024-03-11 13:49:04',
                'updated_at' => '2024-03-11 13:49:04',
            ),
            24 => 
            array (
                'id' => 25,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'var-size-mm\',odoo_name: \'Taille (mm)\',comment: \'<p>Size in Milimeter - Variant index attribute</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'4\',data_type_id: \'5\',sort: \'24\'',
            'new_values' => 'name: \'var-size-mm\',odoo_name: \'Taille (mm)\',comment: \'<p>Size in Milimeter - Variant index attribute</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'4\',data_type_id: \'5\',sort: \'24\'',
                'created_at' => '2024-03-11 13:49:04',
                'updated_at' => '2024-03-11 13:49:04',
            ),
            25 => 
            array (
                'id' => 26,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'var-surface-m2\',odoo_name: \'Surface (m2)\',comment: \'<p>Surface in Square Meters - Variant index attribute</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'7\',data_type_id: \'5\',sort: \'25\'',
            'new_values' => 'name: \'var-surface-m2\',odoo_name: \'Surface (m2)\',comment: \'<p>Surface in Square Meters - Variant index attribute</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'7\',data_type_id: \'5\',sort: \'25\'',
                'created_at' => '2024-03-11 13:49:04',
                'updated_at' => '2024-03-11 13:49:04',
            ),
            26 => 
            array (
                'id' => 27,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'var-surface-cm2\',odoo_name: \'Surface (cm2)\',comment: \'<p>Surface in Square Centimeter - Variant index attribute</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'20\',data_type_id: \'5\',sort: \'26\'',
            'new_values' => 'name: \'var-surface-cm2\',odoo_name: \'Surface (cm2)\',comment: \'<p>Surface in Square Centimeter - Variant index attribute</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'20\',data_type_id: \'5\',sort: \'26\'',
                'created_at' => '2024-03-11 13:49:04',
                'updated_at' => '2024-03-11 13:49:04',
            ),
            27 => 
            array (
                'id' => 28,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'var-volume-l\',odoo_name: \'Volume (L)\',comment: \'<p>Volume in Liters - Variant index attribute</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'9\',data_type_id: \'5\',sort: \'27\'',
            'new_values' => 'name: \'var-volume-l\',odoo_name: \'Volume (L)\',comment: \'<p>Volume in Liters - Variant index attribute</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'9\',data_type_id: \'5\',sort: \'27\'',
                'created_at' => '2024-03-11 13:49:04',
                'updated_at' => '2024-03-11 13:49:04',
            ),
            28 => 
            array (
                'id' => 29,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'var-size-ft\',odoo_name: \'Taille (pieds)\',comment: \'<p>Size in Feets - Variant index attribute</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'12\',data_type_id: \'2\',sort: \'28\'',
            'new_values' => 'name: \'var-size-ft\',odoo_name: \'Taille (pieds)\',comment: \'<p>Size in Feets - Variant index attribute</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'12\',data_type_id: \'2\',sort: \'28\'',
                'created_at' => '2024-03-11 13:49:04',
                'updated_at' => '2024-03-11 13:49:04',
            ),
            29 => 
            array (
                'id' => 30,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'var-size-inch\',odoo_name: \'Taille (pouces)\',comment: \'<p>Size in Inches - Variant index attribute</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'11\',data_type_id: \'2\',sort: \'29\'',
            'new_values' => 'name: \'var-size-inch\',odoo_name: \'Taille (pouces)\',comment: \'<p>Size in Inches - Variant index attribute</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'11\',data_type_id: \'2\',sort: \'29\'',
                'created_at' => '2024-03-11 13:49:04',
                'updated_at' => '2024-03-11 13:49:04',
            ),
            30 => 
            array (
                'id' => 31,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'var-size-dble\',odoo_name: \'Taille double\',comment: \'<p>Taille double</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'2\',sort: \'30\'',
                'new_values' => 'name: \'var-size-dble\',odoo_name: \'Taille double\',comment: \'<p>Taille double</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'2\',sort: \'30\'',
                'created_at' => '2024-03-11 13:49:04',
                'updated_at' => '2024-03-11 13:49:04',
            ),
            31 => 
            array (
                'id' => 32,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'var-boot-size-fr\',odoo_name: \'Pointure (Fr)\',comment: \'<p>Boot size in French notation (35-36-..43-44) - Variant index attribute</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'4\',sort: \'31\'',
            'new_values' => 'name: \'var-boot-size-fr\',odoo_name: \'Pointure (Fr)\',comment: \'<p>Boot size in French notation (35-36-..43-44) - Variant index attribute</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'4\',sort: \'31\'',
                'created_at' => '2024-03-11 13:49:04',
                'updated_at' => '2024-03-11 13:49:04',
            ),
            32 => 
            array (
                'id' => 33,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'var-boot-size-uk\',odoo_name: \'Pointure (Uk)\',comment: \'<p>Boot size in Uk notation (6-6.5-7 ... 10-10.5) - Variant index attribute Only integer value or x.5 value</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'5\',sort: \'32\'',
            'new_values' => 'name: \'var-boot-size-uk\',odoo_name: \'Pointure (Uk)\',comment: \'<p>Boot size in Uk notation (6-6.5-7 ... 10-10.5) - Variant index attribute Only integer value or x.5 value</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'5\',sort: \'32\'',
                'created_at' => '2024-03-11 13:49:04',
                'updated_at' => '2024-03-11 13:49:04',
            ),
            33 => 
            array (
                'id' => 34,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'var-boot-size-us\',odoo_name: \'Pointure (Us)\',comment: \'<p>Boot size in Us notation (6-6.5-7 ... 10-10.5) - Variant index attribute Only integer value or x.5 value</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'5\',sort: \'33\'',
            'new_values' => 'name: \'var-boot-size-us\',odoo_name: \'Pointure (Us)\',comment: \'<p>Boot size in Us notation (6-6.5-7 ... 10-10.5) - Variant index attribute Only integer value or x.5 value</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'5\',sort: \'33\'',
                'created_at' => '2024-03-11 13:49:04',
                'updated_at' => '2024-03-11 13:49:04',
            ),
            34 => 
            array (
                'id' => 35,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'var-boot-size-mondo\',odoo_name: \'Pointure (mondo)\',comment: \'<p>Boot size in Mondopoint (25-25.5-26 ... 28-28.5-29) - Variant index attribute Only integer value or x.5 value This represents the length of the foot in centimeters</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'5\',sort: \'34\'',
            'new_values' => 'name: \'var-boot-size-mondo\',odoo_name: \'Pointure (mondo)\',comment: \'<p>Boot size in Mondopoint (25-25.5-26 ... 28-28.5-29) - Variant index attribute Only integer value or x.5 value This represents the length of the foot in centimeters</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'5\',sort: \'34\'',
                'created_at' => '2024-03-11 13:49:04',
                'updated_at' => '2024-03-11 13:49:04',
            ),
            35 => 
            array (
                'id' => 36,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'var-item-nb\',odoo_name: \'Repère\',comment: \'<p>Item number - Variant index attribute Various usage</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'4\',sort: \'35\'',
                'new_values' => 'name: \'var-item-nb\',odoo_name: \'Repère\',comment: \'<p>Item number - Variant index attribute Various usage</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'4\',sort: \'35\'',
                'created_at' => '2024-03-11 13:49:04',
                'updated_at' => '2024-03-11 13:49:04',
            ),
            36 => 
            array (
                'id' => 37,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'var-weight-kg\',odoo_name: \'\',comment: \'Weight in Kilogram - Variant index attribute\',required: \'0\',attribute_list_id: \'\',unit_id: \'5\',data_type_id: \'5\',sort: \'36\'',
                'new_values' => 'name: \'var-weight-kg\',odoo_name: \'\',comment: \'Weight in Kilogram - Variant index attribute\',required: \'\',attribute_list_id: \'\',unit_id: \'5\',data_type_id: \'5\',sort: \'36\'',
                'created_at' => '2024-03-11 13:49:04',
                'updated_at' => '2024-03-11 13:49:04',
            ),
            37 => 
            array (
                'id' => 38,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'var-weight-g\',odoo_name: \'Poids (g)\',comment: \'<p>Weight in grams - Variant index attribute</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'6\',data_type_id: \'5\',sort: \'37\'',
            'new_values' => 'name: \'var-weight-g\',odoo_name: \'Poids (g)\',comment: \'<p>Weight in grams - Variant index attribute</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'6\',data_type_id: \'5\',sort: \'37\'',
                'created_at' => '2024-03-11 13:49:04',
                'updated_at' => '2024-03-11 13:49:04',
            ),
            38 => 
            array (
                'id' => 39,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'var-color\',odoo_name: \'Couleur\',comment: \'<p>Color - Variant index attribute</p>\',required: \'0\',attribute_list_id: \'1\',unit_id: \'\',data_type_id: \'1\',sort: \'38\'',
                'new_values' => 'name: \'var-color\',odoo_name: \'Couleur\',comment: \'<p>Color - Variant index attribute</p>\',required: \'\',attribute_list_id: \'1\',unit_id: \'\',data_type_id: \'1\',sort: \'38\'',
                'created_at' => '2024-03-11 13:49:04',
                'updated_at' => '2024-03-11 13:49:04',
            ),
            39 => 
            array (
                'id' => 40,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'var-size-wear-eu\',odoo_name: \'Taille Wear\',comment: \'<p>Clothes EU sizing (36-38-40-42) - Variant index attribute</p>\',required: \'0\',attribute_list_id: \'5\',unit_id: \'\',data_type_id: \'1\',sort: \'39\'',
            'new_values' => 'name: \'var-size-wear-eu\',odoo_name: \'Taille Wear\',comment: \'<p>Clothes EU sizing (36-38-40-42) - Variant index attribute</p>\',required: \'\',attribute_list_id: \'5\',unit_id: \'\',data_type_id: \'1\',sort: \'39\'',
                'created_at' => '2024-03-11 13:49:04',
                'updated_at' => '2024-03-11 13:49:04',
            ),
            40 => 
            array (
                'id' => 41,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'var-size-wear-us\',odoo_name: \'Taille Wear\',comment: \'<p>Clothes US sizing (2-4-6-8) - Variant index attribute</p>\',required: \'0\',attribute_list_id: \'7\',unit_id: \'\',data_type_id: \'1\',sort: \'40\'',
            'new_values' => 'name: \'var-size-wear-us\',odoo_name: \'Taille Wear\',comment: \'<p>Clothes US sizing (2-4-6-8) - Variant index attribute</p>\',required: \'\',attribute_list_id: \'7\',unit_id: \'\',data_type_id: \'1\',sort: \'40\'',
                'created_at' => '2024-03-11 13:49:04',
                'updated_at' => '2024-03-11 13:49:04',
            ),
            41 => 
            array (
                'id' => 42,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'var-size-wear-uk\',odoo_name: \'Taille Wear\',comment: \'<p>Clothes UK sizing (2-4-6-8) - Variant index attribute</p>\',required: \'0\',attribute_list_id: \'6\',unit_id: \'\',data_type_id: \'1\',sort: \'41\'',
            'new_values' => 'name: \'var-size-wear-uk\',odoo_name: \'Taille Wear\',comment: \'<p>Clothes UK sizing (2-4-6-8) - Variant index attribute</p>\',required: \'\',attribute_list_id: \'6\',unit_id: \'\',data_type_id: \'1\',sort: \'41\'',
                'created_at' => '2024-03-11 13:49:04',
                'updated_at' => '2024-03-11 13:49:04',
            ),
            42 => 
            array (
                'id' => 43,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'var-size-wear-int\',odoo_name: \'Taille Wear\',comment: \'<p>Clothes International sizing (XXS-XS... L-XL-XXL) - Variant index attribute</p>\',required: \'0\',attribute_list_id: \'4\',unit_id: \'\',data_type_id: \'1\',sort: \'42\'',
            'new_values' => 'name: \'var-size-wear-int\',odoo_name: \'Taille Wear\',comment: \'<p>Clothes International sizing (XXS-XS... L-XL-XXL) - Variant index attribute</p>\',required: \'\',attribute_list_id: \'4\',unit_id: \'\',data_type_id: \'1\',sort: \'42\'',
                'created_at' => '2024-03-11 13:49:04',
                'updated_at' => '2024-03-11 13:49:04',
            ),
            43 => 
            array (
                'id' => 44,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'sku\',odoo_name: \'\',comment: \'SKU code : unique identifier for one product variant for brand internal use.
This code has to be unique for one product, and has to change each time the product is changing technically (even if only graphics).
It will be used by programs for price updates\',required: \'1\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'2\',sort: \'3\'',
                'new_values' => 'name: \'sku\',odoo_name: \'\',comment: \'SKU code : unique identifier for one product variant for brand internal use.
This code has to be unique for one product, and has to change each time the product is changing technically (even if only graphics).
It will be used by programs for price updates\',required: \'1\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'2\',sort: \'1\'',
                'created_at' => '2024-03-11 13:49:33',
                'updated_at' => '2024-03-11 13:49:33',
            ),
            44 => 
            array (
                'id' => 45,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'name\',odoo_name: \'\',comment: \'Name : official name for trade. Should be as short as possible.
Doesn\'t contain other information that can be found is specialized attribute, like variant data, brand name of year.
For a tee shirt, available in 3 colors and 4 sizes, this will be for exemple : "BRADFORD", and variants data will complete with size and color
For a tee shirt, available in only one colors and 4 sizes, this will be for exemple : "BRADFORD RED", and variants data will complete with size
In both case, the name in not containing the category ("TEE") or brand ("PICTURE").\',required: \'1\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'2\',sort: \'4\'',
                'new_values' => 'name: \'name\',odoo_name: \'\',comment: \'Name : official name for trade. Should be as short as possible.
Doesn\'t contain other information that can be found is specialized attribute, like variant data, brand name of year.
For a tee shirt, available in 3 colors and 4 sizes, this will be for exemple : "BRADFORD", and variants data will complete with size and color
For a tee shirt, available in only one colors and 4 sizes, this will be for exemple : "BRADFORD RED", and variants data will complete with size
In both case, the name in not containing the category ("TEE") or brand ("PICTURE").\',required: \'1\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'2\',sort: \'2\'',
                'created_at' => '2024-03-11 13:49:33',
                'updated_at' => '2024-03-11 13:49:33',
            ),
            45 => 
            array (
                'id' => 46,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'brand\',odoo_name: \'\',comment: \'<p>Product brand This name has to be the one of the brand, but not the one of company or distributor Exemple : "Duotone" but not "Boards and More".</p>\',required: \'1\',attribute_list_id: \'3\',unit_id: \'\',data_type_id: \'1\',sort: \'1\'',
                'new_values' => 'name: \'brand\',odoo_name: \'\',comment: \'<p>Product brand This name has to be the one of the brand, but not the one of company or distributor Exemple : "Duotone" but not "Boards and More".</p>\',required: \'1\',attribute_list_id: \'3\',unit_id: \'\',data_type_id: \'1\',sort: \'3\'',
                'created_at' => '2024-03-11 13:49:33',
                'updated_at' => '2024-03-11 13:49:33',
            ),
            46 => 
            array (
                'id' => 47,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'supplier\',odoo_name: \'\',comment: \'<p>name of the supplier company</p>\',required: \'1\',attribute_list_id: \'9\',unit_id: \'\',data_type_id: \'1\',sort: \'2\'',
                'new_values' => 'name: \'supplier\',odoo_name: \'\',comment: \'<p>name of the supplier company</p>\',required: \'1\',attribute_list_id: \'9\',unit_id: \'\',data_type_id: \'1\',sort: \'4\'',
                'created_at' => '2024-03-11 13:49:33',
                'updated_at' => '2024-03-11 13:49:33',
            ),
            47 => 
            array (
                'id' => 48,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'category\',odoo_name: \'\',comment: \'Commercial category for product classification\',required: \'1\',attribute_list_id: \'2\',unit_id: \'\',data_type_id: \'1\',sort: \'5\'',
                'new_values' => 'name: \'category\',odoo_name: \'\',comment: \'Commercial category for product classification\',required: \'1\',attribute_list_id: \'2\',unit_id: \'\',data_type_id: \'1\',sort: \'5\'',
                'created_at' => '2024-03-11 13:49:33',
                'updated_at' => '2024-03-11 13:49:33',
            ),
            48 => 
            array (
                'id' => 49,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'wholesale-price\',odoo_name: \'\',comment: \'Wholesale Price : Standard purchase price excuding VAT.
This does not include any discount (like volume discount, year discount, client specific discount).\',required: \'1\',attribute_list_id: \'\',unit_id: \'16\',data_type_id: \'6\',sort: \'6\'',
                'new_values' => 'name: \'wholesale-price\',odoo_name: \'\',comment: \'Wholesale Price : Standard purchase price excuding VAT.
This does not include any discount (like volume discount, year discount, client specific discount).\',required: \'1\',attribute_list_id: \'\',unit_id: \'16\',data_type_id: \'6\',sort: \'6\'',
                'created_at' => '2024-03-11 13:49:33',
                'updated_at' => '2024-03-11 13:49:33',
            ),
            49 => 
            array (
                'id' => 50,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'retail-price\',odoo_name: \'\',comment: \'Retail Price : Recommanded retail price including VAT\',required: \'1\',attribute_list_id: \'\',unit_id: \'16\',data_type_id: \'6\',sort: \'7\'',
                'new_values' => 'name: \'retail-price\',odoo_name: \'\',comment: \'Retail Price : Recommanded retail price including VAT\',required: \'1\',attribute_list_id: \'\',unit_id: \'16\',data_type_id: \'6\',sort: \'7\'',
                'created_at' => '2024-03-11 13:49:33',
                'updated_at' => '2024-03-11 13:49:33',
            ),
            50 => 
            array (
                'id' => 51,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'weight\',odoo_name: \'\',comment: \'Weight of the whole product, for logistic purpose\',required: \'1\',attribute_list_id: \'\',unit_id: \'5\',data_type_id: \'5\',sort: \'8\'',
                'new_values' => 'name: \'weight\',odoo_name: \'\',comment: \'Weight of the whole product, for logistic purpose\',required: \'1\',attribute_list_id: \'\',unit_id: \'5\',data_type_id: \'5\',sort: \'8\'',
                'created_at' => '2024-03-11 13:49:33',
                'updated_at' => '2024-03-11 13:49:33',
            ),
            51 => 
            array (
                'id' => 52,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'ean\',odoo_name: \'\',comment: \'EAN code : unique identifier for one product variant delivered by GS1 autority or similar\',required: \'0\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'2\',sort: \'9\'',
                'new_values' => 'name: \'ean\',odoo_name: \'\',comment: \'EAN code : unique identifier for one product variant delivered by GS1 autority or similar\',required: \'\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'2\',sort: \'9\'',
                'created_at' => '2024-03-11 13:49:33',
                'updated_at' => '2024-03-11 13:49:33',
            ),
            52 => 
            array (
                'id' => 53,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'season\',odoo_name: \'\',comment: \'<p>Year validity for the product, for the case where this product is specific to one season. This has to be a year like 2023. We suggest that this should be the last year of validity (ie. 2024 for a 23-24 winter season product)</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'9\',sort: \'10\'',
            'new_values' => 'name: \'season\',odoo_name: \'\',comment: \'<p>Year validity for the product, for the case where this product is specific to one season. This has to be a year like 2023. We suggest that this should be the last year of validity (ie. 2024 for a 23-24 winter season product)</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'9\',sort: \'10\'',
                'created_at' => '2024-03-11 13:49:33',
                'updated_at' => '2024-03-11 13:49:33',
            ),
            53 => 
            array (
                'id' => 54,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'description-long-fr\',odoo_name: \'\',comment: \'Description longue en Français : description marketing complète du produit, à destination des sites web. Peut contenir un formatage HTML basique.\',required: \'0\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'7\',sort: \'11\'',
                'new_values' => 'name: \'description-long-fr\',odoo_name: \'\',comment: \'Description longue en Français : description marketing complète du produit, à destination des sites web. Peut contenir un formatage HTML basique.\',required: \'\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'7\',sort: \'11\'',
                'created_at' => '2024-03-11 13:49:33',
                'updated_at' => '2024-03-11 13:49:33',
            ),
            54 => 
            array (
                'id' => 55,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'description-short-fr\',odoo_name: \'\',comment: \'Description courte en Français : description marketing résumée du produit, idéalement une 15aine de mots maximum\',required: \'0\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'7\',sort: \'12\'',
                'new_values' => 'name: \'description-short-fr\',odoo_name: \'\',comment: \'Description courte en Français : description marketing résumée du produit, idéalement une 15aine de mots maximum\',required: \'\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'7\',sort: \'12\'',
                'created_at' => '2024-03-11 13:49:33',
                'updated_at' => '2024-03-11 13:49:33',
            ),
            55 => 
            array (
                'id' => 56,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'pictures\',odoo_name: \'\',comment: \'<p>Product picture links, semicolon separated, no space or special character except _ and -, most important first. We suggest that picture should be square aspect, at least 800x800px, white background, jpeg format. We suggest that picture should be stored on a cnd, so that processing programs could upload them automatically.</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'8\',sort: \'13\'',
                'new_values' => 'name: \'pictures\',odoo_name: \'\',comment: \'<p>Product picture links, semicolon separated, no space or special character except _ and -, most important first. We suggest that picture should be square aspect, at least 800x800px, white background, jpeg format. We suggest that picture should be stored on a cnd, so that processing programs could upload them automatically.</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'8\',sort: \'13\'',
                'created_at' => '2024-03-11 13:49:33',
                'updated_at' => '2024-03-11 13:49:33',
            ),
            56 => 
            array (
                'id' => 57,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'uom\',odoo_name: \'\',comment: \'Tells how product quantity is managed in stock (unit if not defined)\',required: \'0\',attribute_list_id: \'8\',unit_id: \'\',data_type_id: \'1\',sort: \'14\'',
            'new_values' => 'name: \'uom\',odoo_name: \'\',comment: \'Tells how product quantity is managed in stock (unit if not defined)\',required: \'\',attribute_list_id: \'8\',unit_id: \'\',data_type_id: \'1\',sort: \'14\'',
                'created_at' => '2024-03-11 13:49:33',
                'updated_at' => '2024-03-11 13:49:33',
            ),
            57 => 
            array (
                'id' => 58,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'logistic-qty\',odoo_name: \'\',comment: \'tells how is handled product from logistics
if uom is "package", quantity in each package
id uom us "unit", quantity by carton\',required: \'0\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'4\',sort: \'15\'',
                'new_values' => 'name: \'logistic-qty\',odoo_name: \'\',comment: \'tells how is handled product from logistics
if uom is "package", quantity in each package
id uom us "unit", quantity by carton\',required: \'\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'4\',sort: \'15\'',
                'created_at' => '2024-03-11 13:49:33',
                'updated_at' => '2024-03-11 13:49:33',
            ),
            58 => 
            array (
                'id' => 59,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'size-1\',odoo_name: \'\',comment: \'Lenght for logistic purpose\',required: \'0\',attribute_list_id: \'\',unit_id: \'2\',data_type_id: \'5\',sort: \'16\'',
                'new_values' => 'name: \'size-1\',odoo_name: \'\',comment: \'Lenght for logistic purpose\',required: \'\',attribute_list_id: \'\',unit_id: \'2\',data_type_id: \'5\',sort: \'16\'',
                'created_at' => '2024-03-11 13:49:33',
                'updated_at' => '2024-03-11 13:49:33',
            ),
            59 => 
            array (
                'id' => 60,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'size-2\',odoo_name: \'\',comment: \'Wide for logistic purpose\',required: \'0\',attribute_list_id: \'\',unit_id: \'2\',data_type_id: \'5\',sort: \'17\'',
                'new_values' => 'name: \'size-2\',odoo_name: \'\',comment: \'Wide for logistic purpose\',required: \'\',attribute_list_id: \'\',unit_id: \'2\',data_type_id: \'5\',sort: \'17\'',
                'created_at' => '2024-03-11 13:49:33',
                'updated_at' => '2024-03-11 13:49:33',
            ),
            60 => 
            array (
                'id' => 61,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'size-3\',odoo_name: \'\',comment: \'Height for logistic purpose\',required: \'0\',attribute_list_id: \'\',unit_id: \'2\',data_type_id: \'5\',sort: \'18\'',
                'new_values' => 'name: \'size-3\',odoo_name: \'\',comment: \'Height for logistic purpose\',required: \'\',attribute_list_id: \'\',unit_id: \'2\',data_type_id: \'5\',sort: \'18\'',
                'created_at' => '2024-03-11 13:49:33',
                'updated_at' => '2024-03-11 13:49:33',
            ),
            61 => 
            array (
                'id' => 62,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'discount-b2c\',odoo_name: \'\',comment: \'Discounted suggested retail price including VAT.
Mainly used for price update during promotional periods.\',required: \'0\',attribute_list_id: \'\',unit_id: \'16\',data_type_id: \'6\',sort: \'19\'',
                'new_values' => 'name: \'discount-b2c\',odoo_name: \'\',comment: \'Discounted suggested retail price including VAT.
Mainly used for price update during promotional periods.\',required: \'\',attribute_list_id: \'\',unit_id: \'16\',data_type_id: \'6\',sort: \'19\'',
                'created_at' => '2024-03-11 13:49:33',
                'updated_at' => '2024-03-11 13:49:33',
            ),
            62 => 
            array (
                'id' => 63,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'discount-b2b-pc\',odoo_name: \'\',comment: \'<p>Discounted percent on b2b price excluding VAT. This can be used to store client specific discount, volume discount, year discount etc.</p><p>Used if discount-b2b is not filled</p><p>1.0 is for 100% discount, 0.2 is for 20% discount</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'5\',sort: \'20\'',
                'new_values' => 'name: \'discount-b2b-pc\',odoo_name: \'\',comment: \'<p>Discounted percent on b2b price excluding VAT. This can be used to store client specific discount, volume discount, year discount etc.</p><p>Used if discount-b2b is not filled</p><p>1.0 is for 100% discount, 0.2 is for 20% discount</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'5\',sort: \'20\'',
                'created_at' => '2024-03-11 13:49:33',
                'updated_at' => '2024-03-11 13:49:33',
            ),
            63 => 
            array (
                'id' => 64,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'discount-b2b\',odoo_name: \'\',comment: \'Discounted b2b price excluding VAT.
This can be used to store client specific discount, volume discount, year discount etc.\',required: \'0\',attribute_list_id: \'\',unit_id: \'16\',data_type_id: \'6\',sort: \'21\'',
                'new_values' => 'name: \'discount-b2b\',odoo_name: \'\',comment: \'Discounted b2b price excluding VAT.
This can be used to store client specific discount, volume discount, year discount etc.\',required: \'\',attribute_list_id: \'\',unit_id: \'16\',data_type_id: \'6\',sort: \'21\'',
                'created_at' => '2024-03-11 13:49:33',
                'updated_at' => '2024-03-11 13:49:33',
            ),
            64 => 
            array (
                'id' => 65,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'var-size-m\',odoo_name: \'Taille (m)\',comment: \'<p>Size in Meters. Variant index attribute</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'2\',data_type_id: \'5\',sort: \'22\'',
            'new_values' => 'name: \'var-size-m\',odoo_name: \'Taille (m)\',comment: \'<p>Size in Meters. Variant index attribute</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'2\',data_type_id: \'5\',sort: \'22\'',
                'created_at' => '2024-03-11 13:49:33',
                'updated_at' => '2024-03-11 13:49:33',
            ),
            65 => 
            array (
                'id' => 66,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'var-size-cm\',odoo_name: \'Taille (cm)\',comment: \'<p>Size in Centimeter - Variant index attribute</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'3\',data_type_id: \'5\',sort: \'23\'',
            'new_values' => 'name: \'var-size-cm\',odoo_name: \'Taille (cm)\',comment: \'<p>Size in Centimeter - Variant index attribute</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'3\',data_type_id: \'5\',sort: \'23\'',
                'created_at' => '2024-03-11 13:49:33',
                'updated_at' => '2024-03-11 13:49:33',
            ),
            66 => 
            array (
                'id' => 67,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'var-size-mm\',odoo_name: \'Taille (mm)\',comment: \'<p>Size in Milimeter - Variant index attribute</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'4\',data_type_id: \'5\',sort: \'24\'',
            'new_values' => 'name: \'var-size-mm\',odoo_name: \'Taille (mm)\',comment: \'<p>Size in Milimeter - Variant index attribute</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'4\',data_type_id: \'5\',sort: \'24\'',
                'created_at' => '2024-03-11 13:49:33',
                'updated_at' => '2024-03-11 13:49:33',
            ),
            67 => 
            array (
                'id' => 68,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'var-surface-m2\',odoo_name: \'Surface (m2)\',comment: \'<p>Surface in Square Meters - Variant index attribute</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'7\',data_type_id: \'5\',sort: \'25\'',
            'new_values' => 'name: \'var-surface-m2\',odoo_name: \'Surface (m2)\',comment: \'<p>Surface in Square Meters - Variant index attribute</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'7\',data_type_id: \'5\',sort: \'25\'',
                'created_at' => '2024-03-11 13:49:33',
                'updated_at' => '2024-03-11 13:49:33',
            ),
            68 => 
            array (
                'id' => 69,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'var-surface-cm2\',odoo_name: \'Surface (cm2)\',comment: \'<p>Surface in Square Centimeter - Variant index attribute</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'20\',data_type_id: \'5\',sort: \'26\'',
            'new_values' => 'name: \'var-surface-cm2\',odoo_name: \'Surface (cm2)\',comment: \'<p>Surface in Square Centimeter - Variant index attribute</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'20\',data_type_id: \'5\',sort: \'26\'',
                'created_at' => '2024-03-11 13:49:33',
                'updated_at' => '2024-03-11 13:49:33',
            ),
            69 => 
            array (
                'id' => 70,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'var-volume-l\',odoo_name: \'Volume (L)\',comment: \'<p>Volume in Liters - Variant index attribute</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'9\',data_type_id: \'5\',sort: \'27\'',
            'new_values' => 'name: \'var-volume-l\',odoo_name: \'Volume (L)\',comment: \'<p>Volume in Liters - Variant index attribute</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'9\',data_type_id: \'5\',sort: \'27\'',
                'created_at' => '2024-03-11 13:49:33',
                'updated_at' => '2024-03-11 13:49:33',
            ),
            70 => 
            array (
                'id' => 71,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'var-size-ft\',odoo_name: \'Taille (pieds)\',comment: \'<p>Size in Feets - Variant index attribute</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'12\',data_type_id: \'2\',sort: \'28\'',
            'new_values' => 'name: \'var-size-ft\',odoo_name: \'Taille (pieds)\',comment: \'<p>Size in Feets - Variant index attribute</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'12\',data_type_id: \'2\',sort: \'28\'',
                'created_at' => '2024-03-11 13:49:33',
                'updated_at' => '2024-03-11 13:49:33',
            ),
            71 => 
            array (
                'id' => 72,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'var-size-inch\',odoo_name: \'Taille (pouces)\',comment: \'<p>Size in Inches - Variant index attribute</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'11\',data_type_id: \'2\',sort: \'29\'',
            'new_values' => 'name: \'var-size-inch\',odoo_name: \'Taille (pouces)\',comment: \'<p>Size in Inches - Variant index attribute</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'11\',data_type_id: \'2\',sort: \'29\'',
                'created_at' => '2024-03-11 13:49:33',
                'updated_at' => '2024-03-11 13:49:33',
            ),
            72 => 
            array (
                'id' => 73,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'var-size-dble\',odoo_name: \'Taille double\',comment: \'<p>Taille double</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'2\',sort: \'30\'',
                'new_values' => 'name: \'var-size-dble\',odoo_name: \'Taille double\',comment: \'<p>Taille double</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'2\',sort: \'30\'',
                'created_at' => '2024-03-11 13:49:33',
                'updated_at' => '2024-03-11 13:49:33',
            ),
            73 => 
            array (
                'id' => 74,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'var-boot-size-fr\',odoo_name: \'Pointure (Fr)\',comment: \'<p>Boot size in French notation (35-36-..43-44) - Variant index attribute</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'4\',sort: \'31\'',
            'new_values' => 'name: \'var-boot-size-fr\',odoo_name: \'Pointure (Fr)\',comment: \'<p>Boot size in French notation (35-36-..43-44) - Variant index attribute</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'4\',sort: \'31\'',
                'created_at' => '2024-03-11 13:49:33',
                'updated_at' => '2024-03-11 13:49:33',
            ),
            74 => 
            array (
                'id' => 75,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'var-boot-size-uk\',odoo_name: \'Pointure (Uk)\',comment: \'<p>Boot size in Uk notation (6-6.5-7 ... 10-10.5) - Variant index attribute Only integer value or x.5 value</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'5\',sort: \'32\'',
            'new_values' => 'name: \'var-boot-size-uk\',odoo_name: \'Pointure (Uk)\',comment: \'<p>Boot size in Uk notation (6-6.5-7 ... 10-10.5) - Variant index attribute Only integer value or x.5 value</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'5\',sort: \'32\'',
                'created_at' => '2024-03-11 13:49:33',
                'updated_at' => '2024-03-11 13:49:33',
            ),
            75 => 
            array (
                'id' => 76,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'var-boot-size-us\',odoo_name: \'Pointure (Us)\',comment: \'<p>Boot size in Us notation (6-6.5-7 ... 10-10.5) - Variant index attribute Only integer value or x.5 value</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'5\',sort: \'33\'',
            'new_values' => 'name: \'var-boot-size-us\',odoo_name: \'Pointure (Us)\',comment: \'<p>Boot size in Us notation (6-6.5-7 ... 10-10.5) - Variant index attribute Only integer value or x.5 value</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'5\',sort: \'33\'',
                'created_at' => '2024-03-11 13:49:33',
                'updated_at' => '2024-03-11 13:49:33',
            ),
            76 => 
            array (
                'id' => 77,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'var-boot-size-mondo\',odoo_name: \'Pointure (mondo)\',comment: \'<p>Boot size in Mondopoint (25-25.5-26 ... 28-28.5-29) - Variant index attribute Only integer value or x.5 value This represents the length of the foot in centimeters</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'5\',sort: \'34\'',
            'new_values' => 'name: \'var-boot-size-mondo\',odoo_name: \'Pointure (mondo)\',comment: \'<p>Boot size in Mondopoint (25-25.5-26 ... 28-28.5-29) - Variant index attribute Only integer value or x.5 value This represents the length of the foot in centimeters</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'5\',sort: \'34\'',
                'created_at' => '2024-03-11 13:49:33',
                'updated_at' => '2024-03-11 13:49:33',
            ),
            77 => 
            array (
                'id' => 78,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'var-item-nb\',odoo_name: \'Repère\',comment: \'<p>Item number - Variant index attribute Various usage</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'4\',sort: \'35\'',
                'new_values' => 'name: \'var-item-nb\',odoo_name: \'Repère\',comment: \'<p>Item number - Variant index attribute Various usage</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'4\',sort: \'35\'',
                'created_at' => '2024-03-11 13:49:33',
                'updated_at' => '2024-03-11 13:49:33',
            ),
            78 => 
            array (
                'id' => 79,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'var-weight-kg\',odoo_name: \'\',comment: \'Weight in Kilogram - Variant index attribute\',required: \'0\',attribute_list_id: \'\',unit_id: \'5\',data_type_id: \'5\',sort: \'36\'',
                'new_values' => 'name: \'var-weight-kg\',odoo_name: \'\',comment: \'Weight in Kilogram - Variant index attribute\',required: \'\',attribute_list_id: \'\',unit_id: \'5\',data_type_id: \'5\',sort: \'36\'',
                'created_at' => '2024-03-11 13:49:33',
                'updated_at' => '2024-03-11 13:49:33',
            ),
            79 => 
            array (
                'id' => 80,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'var-weight-g\',odoo_name: \'Poids (g)\',comment: \'<p>Weight in grams - Variant index attribute</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'6\',data_type_id: \'5\',sort: \'37\'',
            'new_values' => 'name: \'var-weight-g\',odoo_name: \'Poids (g)\',comment: \'<p>Weight in grams - Variant index attribute</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'6\',data_type_id: \'5\',sort: \'37\'',
                'created_at' => '2024-03-11 13:49:33',
                'updated_at' => '2024-03-11 13:49:33',
            ),
            80 => 
            array (
                'id' => 81,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'var-color\',odoo_name: \'Couleur\',comment: \'<p>Color - Variant index attribute</p>\',required: \'0\',attribute_list_id: \'1\',unit_id: \'\',data_type_id: \'1\',sort: \'38\'',
                'new_values' => 'name: \'var-color\',odoo_name: \'Couleur\',comment: \'<p>Color - Variant index attribute</p>\',required: \'\',attribute_list_id: \'1\',unit_id: \'\',data_type_id: \'1\',sort: \'38\'',
                'created_at' => '2024-03-11 13:49:33',
                'updated_at' => '2024-03-11 13:49:33',
            ),
            81 => 
            array (
                'id' => 82,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'var-size-wear-eu\',odoo_name: \'Taille Wear\',comment: \'<p>Clothes EU sizing (36-38-40-42) - Variant index attribute</p>\',required: \'0\',attribute_list_id: \'5\',unit_id: \'\',data_type_id: \'1\',sort: \'39\'',
            'new_values' => 'name: \'var-size-wear-eu\',odoo_name: \'Taille Wear\',comment: \'<p>Clothes EU sizing (36-38-40-42) - Variant index attribute</p>\',required: \'\',attribute_list_id: \'5\',unit_id: \'\',data_type_id: \'1\',sort: \'39\'',
                'created_at' => '2024-03-11 13:49:33',
                'updated_at' => '2024-03-11 13:49:33',
            ),
            82 => 
            array (
                'id' => 83,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'var-size-wear-us\',odoo_name: \'Taille Wear\',comment: \'<p>Clothes US sizing (2-4-6-8) - Variant index attribute</p>\',required: \'0\',attribute_list_id: \'7\',unit_id: \'\',data_type_id: \'1\',sort: \'40\'',
            'new_values' => 'name: \'var-size-wear-us\',odoo_name: \'Taille Wear\',comment: \'<p>Clothes US sizing (2-4-6-8) - Variant index attribute</p>\',required: \'\',attribute_list_id: \'7\',unit_id: \'\',data_type_id: \'1\',sort: \'40\'',
                'created_at' => '2024-03-11 13:49:33',
                'updated_at' => '2024-03-11 13:49:33',
            ),
            83 => 
            array (
                'id' => 84,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'var-size-wear-uk\',odoo_name: \'Taille Wear\',comment: \'<p>Clothes UK sizing (2-4-6-8) - Variant index attribute</p>\',required: \'0\',attribute_list_id: \'6\',unit_id: \'\',data_type_id: \'1\',sort: \'41\'',
            'new_values' => 'name: \'var-size-wear-uk\',odoo_name: \'Taille Wear\',comment: \'<p>Clothes UK sizing (2-4-6-8) - Variant index attribute</p>\',required: \'\',attribute_list_id: \'6\',unit_id: \'\',data_type_id: \'1\',sort: \'41\'',
                'created_at' => '2024-03-11 13:49:33',
                'updated_at' => '2024-03-11 13:49:33',
            ),
            84 => 
            array (
                'id' => 85,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'var-size-wear-int\',odoo_name: \'Taille Wear\',comment: \'<p>Clothes International sizing (XXS-XS... L-XL-XXL) - Variant index attribute</p>\',required: \'0\',attribute_list_id: \'4\',unit_id: \'\',data_type_id: \'1\',sort: \'42\'',
            'new_values' => 'name: \'var-size-wear-int\',odoo_name: \'Taille Wear\',comment: \'<p>Clothes International sizing (XXS-XS... L-XL-XXL) - Variant index attribute</p>\',required: \'\',attribute_list_id: \'4\',unit_id: \'\',data_type_id: \'1\',sort: \'42\'',
                'created_at' => '2024-03-11 13:49:33',
                'updated_at' => '2024-03-11 13:49:33',
            ),
            85 => 
            array (
                'id' => 86,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'supplier\',odoo_name: \'\',comment: \'<p>name of the supplier company</p>\',required: \'1\',attribute_list_id: \'9\',unit_id: \'\',data_type_id: \'1\',sort: \'4\'',
                'new_values' => 'name: \'supplier\',odoo_name: \'\',comment: \'<p> This name has to be the one of the supplier, but not the one of Brand<br/>Exemple : "Boards and More" but not "Duotone".</p>\',required: \'1\',attribute_list_id: \'9\',unit_id: \'\',data_type_id: \'1\',sort: \'4\'',
                'created_at' => '2024-03-11 13:51:49',
                'updated_at' => '2024-03-11 13:51:49',
            ),
            86 => 
            array (
                'id' => 87,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'category\',odoo_name: \'\',comment: \'Commercial category for product classification\',required: \'1\',attribute_list_id: \'2\',unit_id: \'\',data_type_id: \'1\',sort: \'5\'',
                'new_values' => 'name: \'category\',odoo_name: \'\',comment: \'<p>Commercial category for product classification</p>
<p>This information will be used for website and commercial analysis</p>\',required: \'1\',attribute_list_id: \'2\',unit_id: \'\',data_type_id: \'1\',sort: \'5\'',
                'created_at' => '2024-03-11 13:52:50',
                'updated_at' => '2024-03-11 13:52:50',
            ),
            87 => 
            array (
                'id' => 88,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'sku\',odoo_name: \'\',comment: \'SKU code : unique identifier for one product variant for brand internal use.
This code has to be unique for one product, and has to change each time the product is changing technically (even if only graphics).
It will be used by programs for price updates\',required: \'1\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'2\',sort: \'1\'',
                'new_values' => 'name: \'sku\',odoo_name: \'\',comment: \'<p>SKU code : unique identifier for one product variant for brand internal use.</p>
<p>
This code has to be unique for one product, and has to change each time the product is changing technically (even if only graphics).
It will be used by programs for price updates</p>\',required: \'1\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'2\',sort: \'1\'',
                'created_at' => '2024-03-11 13:53:24',
                'updated_at' => '2024-03-11 13:53:24',
            ),
        ));
        
        
    }
}