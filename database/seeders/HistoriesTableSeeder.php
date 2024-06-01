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
                'id' => 50,
                'model' => 'DataType',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'feet\',comment: \'\',validation_str: \'regex:/^\\d+\'(([0-9]\\|1[01])?)$/\',sort: \'0\'',
            'new_values' => 'name: \'feet\',comment: \'The notation has to be with like N\'M where N is representing feets, and M subdivision (inches). M has to be between 0 and 11\',validation_str: \'regex:/^\\d+\'(([0-9]\\|1[01])?)$/\',sort: \'0\'',
                'created_at' => '2024-04-20 16:45:06',
                'updated_at' => '2024-04-20 16:45:06',
            ),
            1 => 
            array (
                'id' => 51,
                'model' => 'DataType',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'inch\',comment: \'\',validation_str: \'regex:/^\\d+"(([0-9]\\|1[01])?)$/\',sort: \'0\'',
            'new_values' => 'name: \'inch\',comment: \'The notation has to be with like N"M where N is representing inches, and M subdivision. M has to be between 0 and 11\',validation_str: \'regex:/^\\d+"(([0-9]\\|1[01])?)$/\',sort: \'0\'',
                'created_at' => '2024-04-20 16:45:38',
                'updated_at' => '2024-04-20 16:45:38',
            ),
            2 => 
            array (
                'id' => 52,
                'model' => 'AttributeListValue',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'watersports-wingfoil-bundle\',comment: \'\',attribute_list_id: \'2\',odoo_name: \'Tous / Winfgfoil / Pack\',sort: \'0\'',
                'new_values' => 'name: \'watersports-wingfoil-bundle\',comment: \'\',attribute_list_id: \'2\',odoo_name: \'Tous / Wingfoil / Pack\',sort: \'0\'',
                'created_at' => '2024-05-11 12:50:44',
                'updated_at' => '2024-05-11 12:50:44',
            ),
            3 => 
            array (
                'id' => 53,
                'model' => 'Attribute',
                'action' => 'CREATE',
                'user_id' => '1',
                'old_values' => 'none',
            'new_values' => 'name: \'generic-ref\',odoo_name: \'\',comment: \'reference of generic product (ie. the product including all variants)\',required: \'\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'2\',sort: \'\'',
                'created_at' => '2024-06-01 09:17:07',
                'updated_at' => '2024-06-01 09:17:07',
            ),
            4 => 
            array (
                'id' => 54,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'sku\',odoo_name: \'\',comment: \'<p>SKU code : unique identifier for one product variant for brand internal use.</p>
<p>
This code has to be unique for one product, and has to change each time the product is changing technically (even if only graphics).
It will be used by programs for price updates</p>\',required: \'1\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'2\',sort: \'1\'',
                'new_values' => 'name: \'sku\',odoo_name: \'\',comment: \'<p>SKU code : unique identifier for one product variant for brand internal use.</p>
<p>
This code has to be unique for one product, and has to change each time the product is changing technically (even if only graphics).
It will be used by programs for price updates</p>\',required: \'1\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'2\',sort: \'1\'',
                'created_at' => '2024-06-01 09:17:26',
                'updated_at' => '2024-06-01 09:17:26',
            ),
            5 => 
            array (
                'id' => 55,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'generic-ref\',odoo_name: \'\',comment: \'reference of generic product (ie. the product including all variants)\',required: \'0\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'2\',sort: \'0\'',
            'new_values' => 'name: \'generic-ref\',odoo_name: \'\',comment: \'reference of generic product (ie. the product including all variants)\',required: \'\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'2\',sort: \'2\'',
                'created_at' => '2024-06-01 09:17:26',
                'updated_at' => '2024-06-01 09:17:26',
            ),
            6 => 
            array (
                'id' => 56,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'ean\',odoo_name: \'\',comment: \'EAN code : unique identifier for one product variant delivered by GS1 autority or similar\',required: \'0\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'2\',sort: \'9\'',
                'new_values' => 'name: \'ean\',odoo_name: \'\',comment: \'EAN code : unique identifier for one product variant delivered by GS1 autority or similar\',required: \'\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'2\',sort: \'3\'',
                'created_at' => '2024-06-01 09:17:26',
                'updated_at' => '2024-06-01 09:17:26',
            ),
            7 => 
            array (
                'id' => 57,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'name\',odoo_name: \'\',comment: \'Name : official name for trade. Should be as short as possible.
Doesn\'t contain other information that can be found is specialized attribute, like variant data, brand name of year.
For a tee shirt, available in 3 colors and 4 sizes, this will be for exemple : "BRADFORD", and variants data will complete with size and color
For a tee shirt, available in only one colors and 4 sizes, this will be for exemple : "BRADFORD RED", and variants data will complete with size
In both case, the name in not containing the category ("TEE") or brand ("PICTURE").\',required: \'1\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'2\',sort: \'2\'',
                'new_values' => 'name: \'name\',odoo_name: \'\',comment: \'Name : official name for trade. Should be as short as possible.
Doesn\'t contain other information that can be found is specialized attribute, like variant data, brand name of year.
For a tee shirt, available in 3 colors and 4 sizes, this will be for exemple : "BRADFORD", and variants data will complete with size and color
For a tee shirt, available in only one colors and 4 sizes, this will be for exemple : "BRADFORD RED", and variants data will complete with size
In both case, the name in not containing the category ("TEE") or brand ("PICTURE").\',required: \'1\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'2\',sort: \'4\'',
                'created_at' => '2024-06-01 09:17:26',
                'updated_at' => '2024-06-01 09:17:26',
            ),
            8 => 
            array (
                'id' => 58,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'brand\',odoo_name: \'\',comment: \'<p>Product brand This name has to be the one of the brand, but not the one of company or distributor Exemple : "Duotone" but not "Boards and More".</p>\',required: \'1\',attribute_list_id: \'3\',unit_id: \'\',data_type_id: \'1\',sort: \'3\'',
                'new_values' => 'name: \'brand\',odoo_name: \'\',comment: \'<p>Product brand This name has to be the one of the brand, but not the one of company or distributor Exemple : "Duotone" but not "Boards and More".</p>\',required: \'1\',attribute_list_id: \'3\',unit_id: \'\',data_type_id: \'1\',sort: \'5\'',
                'created_at' => '2024-06-01 09:17:26',
                'updated_at' => '2024-06-01 09:17:26',
            ),
            9 => 
            array (
                'id' => 59,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'supplier\',odoo_name: \'\',comment: \'<p> This name has to be the one of the supplier, but not the one of Brand<br/>Exemple : "Boards and More" but not "Duotone".</p>\',required: \'1\',attribute_list_id: \'9\',unit_id: \'\',data_type_id: \'1\',sort: \'4\'',
                'new_values' => 'name: \'supplier\',odoo_name: \'\',comment: \'<p> This name has to be the one of the supplier, but not the one of Brand<br/>Exemple : "Boards and More" but not "Duotone".</p>\',required: \'1\',attribute_list_id: \'9\',unit_id: \'\',data_type_id: \'1\',sort: \'6\'',
                'created_at' => '2024-06-01 09:17:26',
                'updated_at' => '2024-06-01 09:17:26',
            ),
            10 => 
            array (
                'id' => 60,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'category\',odoo_name: \'\',comment: \'<p>Commercial category for product classification</p>
<p>This information will be used for website and commercial analysis</p>\',required: \'1\',attribute_list_id: \'2\',unit_id: \'\',data_type_id: \'1\',sort: \'5\'',
                'new_values' => 'name: \'category\',odoo_name: \'\',comment: \'<p>Commercial category for product classification</p>
<p>This information will be used for website and commercial analysis</p>\',required: \'1\',attribute_list_id: \'2\',unit_id: \'\',data_type_id: \'1\',sort: \'7\'',
                'created_at' => '2024-06-01 09:17:26',
                'updated_at' => '2024-06-01 09:17:26',
            ),
            11 => 
            array (
                'id' => 61,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'wholesale-price\',odoo_name: \'\',comment: \'Wholesale Price : Standard purchase price excuding VAT.
This does not include any discount (like volume discount, year discount, client specific discount).\',required: \'1\',attribute_list_id: \'\',unit_id: \'16\',data_type_id: \'6\',sort: \'6\'',
                'new_values' => 'name: \'wholesale-price\',odoo_name: \'\',comment: \'Wholesale Price : Standard purchase price excuding VAT.
This does not include any discount (like volume discount, year discount, client specific discount).\',required: \'1\',attribute_list_id: \'\',unit_id: \'16\',data_type_id: \'6\',sort: \'8\'',
                'created_at' => '2024-06-01 09:17:26',
                'updated_at' => '2024-06-01 09:17:26',
            ),
            12 => 
            array (
                'id' => 62,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'retail-price\',odoo_name: \'\',comment: \'Retail Price : Recommanded retail price including VAT\',required: \'1\',attribute_list_id: \'\',unit_id: \'16\',data_type_id: \'6\',sort: \'7\'',
                'new_values' => 'name: \'retail-price\',odoo_name: \'\',comment: \'Retail Price : Recommanded retail price including VAT\',required: \'1\',attribute_list_id: \'\',unit_id: \'16\',data_type_id: \'6\',sort: \'9\'',
                'created_at' => '2024-06-01 09:17:26',
                'updated_at' => '2024-06-01 09:17:26',
            ),
            13 => 
            array (
                'id' => 63,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'weight\',odoo_name: \'\',comment: \'Weight of the whole product, for logistic purpose\',required: \'1\',attribute_list_id: \'\',unit_id: \'5\',data_type_id: \'5\',sort: \'8\'',
                'new_values' => 'name: \'weight\',odoo_name: \'\',comment: \'Weight of the whole product, for logistic purpose\',required: \'1\',attribute_list_id: \'\',unit_id: \'5\',data_type_id: \'5\',sort: \'10\'',
                'created_at' => '2024-06-01 09:17:26',
                'updated_at' => '2024-06-01 09:17:26',
            ),
            14 => 
            array (
                'id' => 64,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'season\',odoo_name: \'\',comment: \'<p>Year validity for the product, for the case where this product is specific to one season. This has to be a year like 2023. We suggest that this should be the last year of validity (ie. 2024 for a 23-24 winter season product)</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'9\',sort: \'10\'',
            'new_values' => 'name: \'season\',odoo_name: \'\',comment: \'<p>Year validity for the product, for the case where this product is specific to one season. This has to be a year like 2023. We suggest that this should be the last year of validity (ie. 2024 for a 23-24 winter season product)</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'9\',sort: \'11\'',
                'created_at' => '2024-06-01 09:17:26',
                'updated_at' => '2024-06-01 09:17:26',
            ),
            15 => 
            array (
                'id' => 65,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'description-long-fr\',odoo_name: \'\',comment: \'Description longue en Français : description marketing complète du produit, à destination des sites web. Peut contenir un formatage HTML basique.\',required: \'0\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'7\',sort: \'11\'',
                'new_values' => 'name: \'description-long-fr\',odoo_name: \'\',comment: \'Description longue en Français : description marketing complète du produit, à destination des sites web. Peut contenir un formatage HTML basique.\',required: \'\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'7\',sort: \'12\'',
                'created_at' => '2024-06-01 09:17:26',
                'updated_at' => '2024-06-01 09:17:26',
            ),
            16 => 
            array (
                'id' => 66,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'description-short-fr\',odoo_name: \'\',comment: \'Description courte en Français : description marketing résumée du produit, idéalement une 15aine de mots maximum\',required: \'0\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'7\',sort: \'12\'',
                'new_values' => 'name: \'description-short-fr\',odoo_name: \'\',comment: \'Description courte en Français : description marketing résumée du produit, idéalement une 15aine de mots maximum\',required: \'\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'7\',sort: \'13\'',
                'created_at' => '2024-06-01 09:17:26',
                'updated_at' => '2024-06-01 09:17:26',
            ),
            17 => 
            array (
                'id' => 67,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'pictures\',odoo_name: \'\',comment: \'<p>Product picture links, no space or special character except _ and -, most important first. We suggest that picture should be square aspect, at least 800x800px, white background, jpeg format. We suggest that picture should be stored on a cnd, so that processing programs could upload them automatically.</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'8\',sort: \'13\'',
                'new_values' => 'name: \'pictures\',odoo_name: \'\',comment: \'<p>Product picture links, no space or special character except _ and -, most important first. We suggest that picture should be square aspect, at least 800x800px, white background, jpeg format. We suggest that picture should be stored on a cnd, so that processing programs could upload them automatically.</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'8\',sort: \'14\'',
                'created_at' => '2024-06-01 09:17:26',
                'updated_at' => '2024-06-01 09:17:26',
            ),
            18 => 
            array (
                'id' => 68,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'uom\',odoo_name: \'\',comment: \'Tells how product quantity is managed in stock (unit if not defined)\',required: \'0\',attribute_list_id: \'8\',unit_id: \'\',data_type_id: \'1\',sort: \'14\'',
            'new_values' => 'name: \'uom\',odoo_name: \'\',comment: \'Tells how product quantity is managed in stock (unit if not defined)\',required: \'\',attribute_list_id: \'8\',unit_id: \'\',data_type_id: \'1\',sort: \'15\'',
                'created_at' => '2024-06-01 09:17:26',
                'updated_at' => '2024-06-01 09:17:26',
            ),
            19 => 
            array (
                'id' => 69,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'logistic-qty\',odoo_name: \'\',comment: \'tells how is handled product from logistics
if uom is "package", quantity in each package
id uom us "unit", quantity by carton\',required: \'0\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'4\',sort: \'15\'',
                'new_values' => 'name: \'logistic-qty\',odoo_name: \'\',comment: \'tells how is handled product from logistics
if uom is "package", quantity in each package
id uom us "unit", quantity by carton\',required: \'\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'4\',sort: \'16\'',
                'created_at' => '2024-06-01 09:17:26',
                'updated_at' => '2024-06-01 09:17:26',
            ),
            20 => 
            array (
                'id' => 70,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'size-1\',odoo_name: \'\',comment: \'Lenght for logistic purpose\',required: \'0\',attribute_list_id: \'\',unit_id: \'2\',data_type_id: \'5\',sort: \'16\'',
                'new_values' => 'name: \'size-1\',odoo_name: \'\',comment: \'Lenght for logistic purpose\',required: \'\',attribute_list_id: \'\',unit_id: \'2\',data_type_id: \'5\',sort: \'17\'',
                'created_at' => '2024-06-01 09:17:26',
                'updated_at' => '2024-06-01 09:17:26',
            ),
            21 => 
            array (
                'id' => 71,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'size-2\',odoo_name: \'\',comment: \'Wide for logistic purpose\',required: \'0\',attribute_list_id: \'\',unit_id: \'2\',data_type_id: \'5\',sort: \'17\'',
                'new_values' => 'name: \'size-2\',odoo_name: \'\',comment: \'Wide for logistic purpose\',required: \'\',attribute_list_id: \'\',unit_id: \'2\',data_type_id: \'5\',sort: \'18\'',
                'created_at' => '2024-06-01 09:17:26',
                'updated_at' => '2024-06-01 09:17:26',
            ),
            22 => 
            array (
                'id' => 72,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'size-3\',odoo_name: \'\',comment: \'Height for logistic purpose\',required: \'0\',attribute_list_id: \'\',unit_id: \'2\',data_type_id: \'5\',sort: \'18\'',
                'new_values' => 'name: \'size-3\',odoo_name: \'\',comment: \'Height for logistic purpose\',required: \'\',attribute_list_id: \'\',unit_id: \'2\',data_type_id: \'5\',sort: \'19\'',
                'created_at' => '2024-06-01 09:17:26',
                'updated_at' => '2024-06-01 09:17:26',
            ),
            23 => 
            array (
                'id' => 73,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'custom-code\',odoo_name: \'\',comment: \'\',required: \'0\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'2\',sort: \'19\'',
                'new_values' => 'name: \'custom-code\',odoo_name: \'\',comment: \'\',required: \'\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'2\',sort: \'20\'',
                'created_at' => '2024-06-01 09:17:26',
                'updated_at' => '2024-06-01 09:17:26',
            ),
            24 => 
            array (
                'id' => 74,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'discount-b2c\',odoo_name: \'\',comment: \'Discounted suggested retail price including VAT.
Mainly used for price update during promotional periods.\',required: \'0\',attribute_list_id: \'\',unit_id: \'16\',data_type_id: \'6\',sort: \'20\'',
                'new_values' => 'name: \'discount-b2c\',odoo_name: \'\',comment: \'Discounted suggested retail price including VAT.
Mainly used for price update during promotional periods.\',required: \'\',attribute_list_id: \'\',unit_id: \'16\',data_type_id: \'6\',sort: \'21\'',
                'created_at' => '2024-06-01 09:17:26',
                'updated_at' => '2024-06-01 09:17:26',
            ),
            25 => 
            array (
                'id' => 75,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'discount-b2b-pc\',odoo_name: \'\',comment: \'<p>Discounted percent on b2b price excluding VAT. This can be used to store client specific discount, volume discount, year discount etc.</p><p>Used if discount-b2b is not filled</p><p>1.0 is for 100% discount, 0.2 is for 20% discount</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'11\',sort: \'21\'',
                'new_values' => 'name: \'discount-b2b-pc\',odoo_name: \'\',comment: \'<p>Discounted percent on b2b price excluding VAT. This can be used to store client specific discount, volume discount, year discount etc.</p><p>Used if discount-b2b is not filled</p><p>1.0 is for 100% discount, 0.2 is for 20% discount</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'11\',sort: \'22\'',
                'created_at' => '2024-06-01 09:17:26',
                'updated_at' => '2024-06-01 09:17:26',
            ),
            26 => 
            array (
                'id' => 76,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'discount-b2b\',odoo_name: \'\',comment: \'Discounted b2b price excluding VAT.
This can be used to store client specific discount, volume discount, year discount etc.\',required: \'0\',attribute_list_id: \'\',unit_id: \'16\',data_type_id: \'6\',sort: \'22\'',
                'new_values' => 'name: \'discount-b2b\',odoo_name: \'\',comment: \'Discounted b2b price excluding VAT.
This can be used to store client specific discount, volume discount, year discount etc.\',required: \'\',attribute_list_id: \'\',unit_id: \'16\',data_type_id: \'6\',sort: \'23\'',
                'created_at' => '2024-06-01 09:17:26',
                'updated_at' => '2024-06-01 09:17:26',
            ),
            27 => 
            array (
                'id' => 77,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'var-size-m\',odoo_name: \'Taille (m)\',comment: \'<p>Size in Meters. Variant index attribute</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'2\',data_type_id: \'5\',sort: \'23\'',
            'new_values' => 'name: \'var-size-m\',odoo_name: \'Taille (m)\',comment: \'<p>Size in Meters. Variant index attribute</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'2\',data_type_id: \'5\',sort: \'24\'',
                'created_at' => '2024-06-01 09:17:26',
                'updated_at' => '2024-06-01 09:17:26',
            ),
            28 => 
            array (
                'id' => 78,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'var-size-cm\',odoo_name: \'Taille (cm)\',comment: \'<p>Size in Centimeter - Variant index attribute</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'3\',data_type_id: \'5\',sort: \'24\'',
            'new_values' => 'name: \'var-size-cm\',odoo_name: \'Taille (cm)\',comment: \'<p>Size in Centimeter - Variant index attribute</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'3\',data_type_id: \'5\',sort: \'25\'',
                'created_at' => '2024-06-01 09:17:26',
                'updated_at' => '2024-06-01 09:17:26',
            ),
            29 => 
            array (
                'id' => 79,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'var-size-mm\',odoo_name: \'Taille (mm)\',comment: \'<p>Size in Milimeter - Variant index attribute</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'4\',data_type_id: \'5\',sort: \'25\'',
            'new_values' => 'name: \'var-size-mm\',odoo_name: \'Taille (mm)\',comment: \'<p>Size in Milimeter - Variant index attribute</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'4\',data_type_id: \'5\',sort: \'26\'',
                'created_at' => '2024-06-01 09:17:26',
                'updated_at' => '2024-06-01 09:17:26',
            ),
            30 => 
            array (
                'id' => 80,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'var-surface-m2\',odoo_name: \'Surface (m2)\',comment: \'<p>Surface in Square Meters - Variant index attribute</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'7\',data_type_id: \'5\',sort: \'26\'',
            'new_values' => 'name: \'var-surface-m2\',odoo_name: \'Surface (m2)\',comment: \'<p>Surface in Square Meters - Variant index attribute</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'7\',data_type_id: \'5\',sort: \'27\'',
                'created_at' => '2024-06-01 09:17:26',
                'updated_at' => '2024-06-01 09:17:26',
            ),
            31 => 
            array (
                'id' => 81,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'var-surface-cm2\',odoo_name: \'Surface (cm2)\',comment: \'<p>Surface in Square Centimeter - Variant index attribute</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'20\',data_type_id: \'5\',sort: \'27\'',
            'new_values' => 'name: \'var-surface-cm2\',odoo_name: \'Surface (cm2)\',comment: \'<p>Surface in Square Centimeter - Variant index attribute</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'20\',data_type_id: \'5\',sort: \'28\'',
                'created_at' => '2024-06-01 09:17:26',
                'updated_at' => '2024-06-01 09:17:26',
            ),
            32 => 
            array (
                'id' => 82,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'var-volume-l\',odoo_name: \'Volume (L)\',comment: \'<p>Volume in Liters - Variant index attribute</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'9\',data_type_id: \'5\',sort: \'28\'',
            'new_values' => 'name: \'var-volume-l\',odoo_name: \'Volume (L)\',comment: \'<p>Volume in Liters - Variant index attribute</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'9\',data_type_id: \'5\',sort: \'29\'',
                'created_at' => '2024-06-01 09:17:26',
                'updated_at' => '2024-06-01 09:17:26',
            ),
            33 => 
            array (
                'id' => 83,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'var-size-ft\',odoo_name: \'Taille (pieds)\',comment: \'<p>Size in Feets - Variant index attribute</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'12\',data_type_id: \'12\',sort: \'29\'',
            'new_values' => 'name: \'var-size-ft\',odoo_name: \'Taille (pieds)\',comment: \'<p>Size in Feets - Variant index attribute</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'12\',data_type_id: \'12\',sort: \'30\'',
                'created_at' => '2024-06-01 09:17:26',
                'updated_at' => '2024-06-01 09:17:26',
            ),
            34 => 
            array (
                'id' => 84,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'var-size-inch\',odoo_name: \'Taille (pouces)\',comment: \'<p>Size in Inches - Variant index attribute</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'11\',data_type_id: \'13\',sort: \'30\'',
            'new_values' => 'name: \'var-size-inch\',odoo_name: \'Taille (pouces)\',comment: \'<p>Size in Inches - Variant index attribute</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'11\',data_type_id: \'13\',sort: \'31\'',
                'created_at' => '2024-06-01 09:17:26',
                'updated_at' => '2024-06-01 09:17:26',
            ),
            35 => 
            array (
                'id' => 85,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'var-size-dble\',odoo_name: \'Taille double\',comment: \'<p>Taille double</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'14\',sort: \'31\'',
                'new_values' => 'name: \'var-size-dble\',odoo_name: \'Taille double\',comment: \'<p>Taille double</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'14\',sort: \'32\'',
                'created_at' => '2024-06-01 09:17:26',
                'updated_at' => '2024-06-01 09:17:26',
            ),
            36 => 
            array (
                'id' => 86,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'var-boot-size-fr\',odoo_name: \'Pointure (Fr)\',comment: \'<p>Boot size in French notation (35-36-..43-44) - Variant index attribute</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'4\',sort: \'32\'',
            'new_values' => 'name: \'var-boot-size-fr\',odoo_name: \'Pointure (Fr)\',comment: \'<p>Boot size in French notation (35-36-..43-44) - Variant index attribute</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'4\',sort: \'33\'',
                'created_at' => '2024-06-01 09:17:26',
                'updated_at' => '2024-06-01 09:17:26',
            ),
            37 => 
            array (
                'id' => 87,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'var-boot-size-uk\',odoo_name: \'Pointure (Uk)\',comment: \'<p>Boot size in Uk notation (6-6.5-7 ... 10-10.5) - Variant index attribute Only integer value or x.5 value</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'5\',sort: \'33\'',
            'new_values' => 'name: \'var-boot-size-uk\',odoo_name: \'Pointure (Uk)\',comment: \'<p>Boot size in Uk notation (6-6.5-7 ... 10-10.5) - Variant index attribute Only integer value or x.5 value</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'5\',sort: \'34\'',
                'created_at' => '2024-06-01 09:17:26',
                'updated_at' => '2024-06-01 09:17:26',
            ),
            38 => 
            array (
                'id' => 88,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'var-boot-size-us\',odoo_name: \'Pointure (Us)\',comment: \'<p>Boot size in Us notation (6-6.5-7 ... 10-10.5) - Variant index attribute Only integer value or x.5 value</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'5\',sort: \'34\'',
            'new_values' => 'name: \'var-boot-size-us\',odoo_name: \'Pointure (Us)\',comment: \'<p>Boot size in Us notation (6-6.5-7 ... 10-10.5) - Variant index attribute Only integer value or x.5 value</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'5\',sort: \'35\'',
                'created_at' => '2024-06-01 09:17:26',
                'updated_at' => '2024-06-01 09:17:26',
            ),
            39 => 
            array (
                'id' => 89,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'var-boot-size-mondo\',odoo_name: \'Pointure (mondo)\',comment: \'<p>Boot size in Mondopoint (25-25.5-26 ... 28-28.5-29) - Variant index attribute Only integer value or x.5 value This represents the length of the foot in centimeters</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'5\',sort: \'35\'',
            'new_values' => 'name: \'var-boot-size-mondo\',odoo_name: \'Pointure (mondo)\',comment: \'<p>Boot size in Mondopoint (25-25.5-26 ... 28-28.5-29) - Variant index attribute Only integer value or x.5 value This represents the length of the foot in centimeters</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'5\',sort: \'36\'',
                'created_at' => '2024-06-01 09:17:26',
                'updated_at' => '2024-06-01 09:17:26',
            ),
            40 => 
            array (
                'id' => 90,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'var-item-nb\',odoo_name: \'Repère\',comment: \'<p>Item number - Variant index attribute Various usage</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'4\',sort: \'36\'',
                'new_values' => 'name: \'var-item-nb\',odoo_name: \'Repère\',comment: \'<p>Item number - Variant index attribute Various usage</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'4\',sort: \'37\'',
                'created_at' => '2024-06-01 09:17:26',
                'updated_at' => '2024-06-01 09:17:26',
            ),
            41 => 
            array (
                'id' => 91,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'var-weight-kg\',odoo_name: \'\',comment: \'Weight in Kilogram - Variant index attribute\',required: \'0\',attribute_list_id: \'\',unit_id: \'5\',data_type_id: \'5\',sort: \'37\'',
                'new_values' => 'name: \'var-weight-kg\',odoo_name: \'\',comment: \'Weight in Kilogram - Variant index attribute\',required: \'\',attribute_list_id: \'\',unit_id: \'5\',data_type_id: \'5\',sort: \'38\'',
                'created_at' => '2024-06-01 09:17:26',
                'updated_at' => '2024-06-01 09:17:26',
            ),
            42 => 
            array (
                'id' => 92,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'var-weight-g\',odoo_name: \'Poids (g)\',comment: \'<p>Weight in grams - Variant index attribute</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'6\',data_type_id: \'5\',sort: \'38\'',
            'new_values' => 'name: \'var-weight-g\',odoo_name: \'Poids (g)\',comment: \'<p>Weight in grams - Variant index attribute</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'6\',data_type_id: \'5\',sort: \'39\'',
                'created_at' => '2024-06-01 09:17:26',
                'updated_at' => '2024-06-01 09:17:26',
            ),
            43 => 
            array (
                'id' => 93,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'var-color\',odoo_name: \'Couleur\',comment: \'<p>Color - Variant index attribute</p>
<p>The color attribute is representing the main (dominent) color for the variant. You can\'t provide a color set for one variant</p>\',required: \'0\',attribute_list_id: \'1\',unit_id: \'\',data_type_id: \'1\',sort: \'39\'',
                'new_values' => 'name: \'var-color\',odoo_name: \'Couleur\',comment: \'<p>Color - Variant index attribute</p>
<p>The color attribute is representing the main (dominent) color for the variant. You can\'t provide a color set for one variant</p>\',required: \'\',attribute_list_id: \'1\',unit_id: \'\',data_type_id: \'1\',sort: \'40\'',
                'created_at' => '2024-06-01 09:17:26',
                'updated_at' => '2024-06-01 09:17:26',
            ),
            44 => 
            array (
                'id' => 94,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'var-size-wear-eu\',odoo_name: \'Taille Wear\',comment: \'<p>Clothes EU sizing (36-38-40-42) - Variant index attribute</p>\',required: \'0\',attribute_list_id: \'5\',unit_id: \'\',data_type_id: \'1\',sort: \'40\'',
            'new_values' => 'name: \'var-size-wear-eu\',odoo_name: \'Taille Wear\',comment: \'<p>Clothes EU sizing (36-38-40-42) - Variant index attribute</p>\',required: \'\',attribute_list_id: \'5\',unit_id: \'\',data_type_id: \'1\',sort: \'41\'',
                'created_at' => '2024-06-01 09:17:26',
                'updated_at' => '2024-06-01 09:17:26',
            ),
            45 => 
            array (
                'id' => 95,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'var-size-wear-us\',odoo_name: \'Taille Wear\',comment: \'<p>Clothes US sizing (2-4-6-8) - Variant index attribute</p>\',required: \'0\',attribute_list_id: \'7\',unit_id: \'\',data_type_id: \'1\',sort: \'41\'',
            'new_values' => 'name: \'var-size-wear-us\',odoo_name: \'Taille Wear\',comment: \'<p>Clothes US sizing (2-4-6-8) - Variant index attribute</p>\',required: \'\',attribute_list_id: \'7\',unit_id: \'\',data_type_id: \'1\',sort: \'42\'',
                'created_at' => '2024-06-01 09:17:26',
                'updated_at' => '2024-06-01 09:17:26',
            ),
            46 => 
            array (
                'id' => 96,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'var-size-wear-uk\',odoo_name: \'Taille Wear\',comment: \'<p>Clothes UK sizing (2-4-6-8) - Variant index attribute</p>\',required: \'0\',attribute_list_id: \'6\',unit_id: \'\',data_type_id: \'1\',sort: \'42\'',
            'new_values' => 'name: \'var-size-wear-uk\',odoo_name: \'Taille Wear\',comment: \'<p>Clothes UK sizing (2-4-6-8) - Variant index attribute</p>\',required: \'\',attribute_list_id: \'6\',unit_id: \'\',data_type_id: \'1\',sort: \'43\'',
                'created_at' => '2024-06-01 09:17:26',
                'updated_at' => '2024-06-01 09:17:26',
            ),
            47 => 
            array (
                'id' => 97,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'var-size-wear-int\',odoo_name: \'Taille Wear\',comment: \'<p>Clothes International sizing (XXS-XS... L-XL-XXL) - Variant index attribute</p>\',required: \'0\',attribute_list_id: \'4\',unit_id: \'\',data_type_id: \'1\',sort: \'43\'',
            'new_values' => 'name: \'var-size-wear-int\',odoo_name: \'Taille Wear\',comment: \'<p>Clothes International sizing (XXS-XS... L-XL-XXL) - Variant index attribute</p>\',required: \'\',attribute_list_id: \'4\',unit_id: \'\',data_type_id: \'1\',sort: \'44\'',
                'created_at' => '2024-06-01 09:17:26',
                'updated_at' => '2024-06-01 09:17:26',
            ),
            48 => 
            array (
                'id' => 98,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'sku\',odoo_name: \'\',comment: \'<p>SKU code : unique identifier for one product variant for brand internal use.</p>
<p>
This code has to be unique for one product, and has to change each time the product is changing technically (even if only graphics).
It will be used by programs for price updates</p>\',required: \'1\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'2\',sort: \'1\'',
                'new_values' => 'name: \'sku\',odoo_name: \'\',comment: \'<p>SKU code : unique identifier for one product variant for brand internal use.</p>
<p>
This code has to be unique for one product, and has to change each time the product is changing technically (even if only graphics).
It will be used by programs for price updates</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'2\',sort: \'1\'',
                'created_at' => '2024-06-01 09:17:41',
                'updated_at' => '2024-06-01 09:17:41',
            ),
            49 => 
            array (
                'id' => 99,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'sku\',odoo_name: \'\',comment: \'<p>SKU code : unique identifier for one product variant for brand internal use.</p>
<p>
This code has to be unique for one product, and has to change each time the product is changing technically (even if only graphics).
It will be used by programs for price updates</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'2\',sort: \'1\'',
                'new_values' => 'name: \'sku\',odoo_name: \'\',comment: \'<p>SKU code : unique identifier for one product variant for brand internal use. Sku is not individually required, but you have to supply either Sku of Generic-ref</p>
<p>
This code has to be unique for one product, and has to change each time the product is changing technically (even if only graphics).
It will be used by programs for price updates</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'2\',sort: \'1\'',
                'created_at' => '2024-06-01 09:19:08',
                'updated_at' => '2024-06-01 09:19:08',
            ),
            50 => 
            array (
                'id' => 100,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
            'old_values' => 'name: \'generic-ref\',odoo_name: \'\',comment: \'reference of generic product (ie. the product including all variants)\',required: \'0\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'2\',sort: \'2\'',
            'new_values' => 'name: \'generic-ref\',odoo_name: \'\',comment: \'reference of generic product (ie. the product including all variants). Generic-ref is not individually required, but you have to supply either Sku of Generic-ref\',required: \'\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'2\',sort: \'2\'',
                'created_at' => '2024-06-01 09:19:28',
                'updated_at' => '2024-06-01 09:19:28',
            ),
            51 => 
            array (
                'id' => 101,
                'model' => 'Attribute',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'sku\',odoo_name: \'\',comment: \'<p>SKU code : unique identifier for one product variant for brand internal use. Sku is not individually required, but you have to supply either Sku of Generic-ref</p>
<p>
This code has to be unique for one product, and has to change each time the product is changing technically (even if only graphics).
It will be used by programs for price updates</p>\',required: \'0\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'2\',sort: \'1\'',
                'new_values' => 'name: \'sku\',odoo_name: \'\',comment: \'<p>SKU code : unique identifier for one product variant for brand internal use. Sku is not individually required, but you have to supply either Sku of Generic-ref</p>
<p>
This code has to be unique for one product, and has to change each time the product is changing technically (even if only graphics).
It will be used by programs for price updates</p>\',required: \'\',attribute_list_id: \'\',unit_id: \'1\',data_type_id: \'2\',sort: \'1\'',
                'created_at' => '2024-06-01 09:19:45',
                'updated_at' => '2024-06-01 09:19:45',
            ),
        ));
        
        
    }
}