<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AttributesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('attributes')->delete();
        
        \DB::table('attributes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'brand',
                'comment' => '<p>Product brand This name has to be the one of the brand, but not the one of company or distributor Exemple : "Duotone" but not "Boards and More".</p>',
                'required' => 1,
                'attribute_list_id' => 3,
                'unit_id' => NULL,
                'data_type_id' => 1,
                'user_id' => 1,
                'odoo_name' => NULL,
                'sort' => 3,
                'created_at' => NULL,
                'updated_at' => '2024-04-20 12:27:11',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'season',
            'comment' => '<p>Year validity for the product, for the case where this product is specific to one season. This has to be a year like 2023. We suggest that this should be the last year of validity (ie. 2024 for a 23-24 winter season product)</p>',
                'required' => 0,
                'attribute_list_id' => NULL,
                'unit_id' => 1,
                'data_type_id' => 9,
                'user_id' => 1,
                'odoo_name' => NULL,
                'sort' => 10,
                'created_at' => NULL,
                'updated_at' => '2024-04-20 12:27:11',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'ean',
                'comment' => 'EAN code : unique identifier for one product variant delivered by GS1 autority or similar',
                'required' => 0,
                'attribute_list_id' => NULL,
                'unit_id' => 1,
                'data_type_id' => 2,
                'user_id' => 1,
                'odoo_name' => NULL,
                'sort' => 9,
                'created_at' => NULL,
                'updated_at' => '2024-04-20 12:27:11',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'sku',
                'comment' => '<p>SKU code : unique identifier for one product variant for brand internal use.</p>
<p>
This code has to be unique for one product, and has to change each time the product is changing technically (even if only graphics).
It will be used by programs for price updates</p>',
                'required' => 1,
                'attribute_list_id' => NULL,
                'unit_id' => 1,
                'data_type_id' => 2,
                'user_id' => 1,
                'odoo_name' => NULL,
                'sort' => 1,
                'created_at' => NULL,
                'updated_at' => '2024-04-20 12:27:11',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'name',
                'comment' => 'Name : official name for trade. Should be as short as possible.
Doesn\'t contain other information that can be found is specialized attribute, like variant data, brand name of year.
For a tee shirt, available in 3 colors and 4 sizes, this will be for exemple : "BRADFORD", and variants data will complete with size and color
For a tee shirt, available in only one colors and 4 sizes, this will be for exemple : "BRADFORD RED", and variants data will complete with size
In both case, the name in not containing the category ("TEE") or brand ("PICTURE").',
                'required' => 1,
                'attribute_list_id' => NULL,
                'unit_id' => 1,
                'data_type_id' => 2,
                'user_id' => 1,
                'odoo_name' => NULL,
                'sort' => 2,
                'created_at' => NULL,
                'updated_at' => '2024-04-20 12:27:11',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'category',
                'comment' => '<p>Commercial category for product classification</p>
<p>This information will be used for website and commercial analysis</p>',
                'required' => 1,
                'attribute_list_id' => 2,
                'unit_id' => NULL,
                'data_type_id' => 1,
                'user_id' => 1,
                'odoo_name' => NULL,
                'sort' => 5,
                'created_at' => NULL,
                'updated_at' => '2024-04-20 12:27:11',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'description-long-fr',
                'comment' => 'Description longue en Français : description marketing complète du produit, à destination des sites web. Peut contenir un formatage HTML basique.',
                'required' => 0,
                'attribute_list_id' => NULL,
                'unit_id' => 1,
                'data_type_id' => 7,
                'user_id' => 1,
                'odoo_name' => NULL,
                'sort' => 11,
                'created_at' => NULL,
                'updated_at' => '2024-04-20 12:27:11',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'description-short-fr',
                'comment' => 'Description courte en Français : description marketing résumée du produit, idéalement une 15aine de mots maximum',
                'required' => 0,
                'attribute_list_id' => NULL,
                'unit_id' => 1,
                'data_type_id' => 7,
                'user_id' => 1,
                'odoo_name' => NULL,
                'sort' => 12,
                'created_at' => NULL,
                'updated_at' => '2024-04-20 12:27:11',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'pictures',
                'comment' => '<p>Product picture links, no space or special character except _ and -, most important first. We suggest that picture should be square aspect, at least 800x800px, white background, jpeg format. We suggest that picture should be stored on a cnd, so that processing programs could upload them automatically.</p>',
                'required' => 0,
                'attribute_list_id' => NULL,
                'unit_id' => 1,
                'data_type_id' => 8,
                'user_id' => 1,
                'odoo_name' => NULL,
                'sort' => 13,
                'created_at' => NULL,
                'updated_at' => '2024-04-20 12:27:11',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'wholesale-price',
                'comment' => 'Wholesale Price : Standard purchase price excuding VAT.
This does not include any discount (like volume discount, year discount, client specific discount).',
                'required' => 1,
                'attribute_list_id' => NULL,
                'unit_id' => 16,
                'data_type_id' => 6,
                'user_id' => 1,
                'odoo_name' => NULL,
                'sort' => 6,
                'created_at' => NULL,
                'updated_at' => '2024-04-20 12:27:11',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'retail-price',
                'comment' => 'Retail Price : Recommanded retail price including VAT',
                'required' => 1,
                'attribute_list_id' => NULL,
                'unit_id' => 16,
                'data_type_id' => 6,
                'user_id' => 1,
                'odoo_name' => NULL,
                'sort' => 7,
                'created_at' => NULL,
                'updated_at' => '2024-04-20 12:27:11',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'weight',
                'comment' => 'Weight of the whole product, for logistic purpose',
                'required' => 1,
                'attribute_list_id' => NULL,
                'unit_id' => 5,
                'data_type_id' => 5,
                'user_id' => 1,
                'odoo_name' => NULL,
                'sort' => 8,
                'created_at' => NULL,
                'updated_at' => '2024-04-20 12:27:11',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'size-1',
                'comment' => 'Lenght for logistic purpose',
                'required' => 0,
                'attribute_list_id' => NULL,
                'unit_id' => 2,
                'data_type_id' => 5,
                'user_id' => 1,
                'odoo_name' => NULL,
                'sort' => 16,
                'created_at' => NULL,
                'updated_at' => '2024-04-20 12:27:11',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'size-2',
                'comment' => 'Wide for logistic purpose',
                'required' => 0,
                'attribute_list_id' => NULL,
                'unit_id' => 2,
                'data_type_id' => 5,
                'user_id' => 1,
                'odoo_name' => NULL,
                'sort' => 17,
                'created_at' => NULL,
                'updated_at' => '2024-04-20 12:27:11',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'size-3',
                'comment' => 'Height for logistic purpose',
                'required' => 0,
                'attribute_list_id' => NULL,
                'unit_id' => 2,
                'data_type_id' => 5,
                'user_id' => 1,
                'odoo_name' => NULL,
                'sort' => 18,
                'created_at' => NULL,
                'updated_at' => '2024-04-20 12:27:11',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'discount-b2c',
                'comment' => 'Discounted suggested retail price including VAT.
Mainly used for price update during promotional periods.',
                'required' => 0,
                'attribute_list_id' => NULL,
                'unit_id' => 16,
                'data_type_id' => 6,
                'user_id' => 1,
                'odoo_name' => NULL,
                'sort' => 20,
                'created_at' => NULL,
                'updated_at' => '2024-04-20 12:27:11',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'discount-b2b',
                'comment' => 'Discounted b2b price excluding VAT.
This can be used to store client specific discount, volume discount, year discount etc.',
                'required' => 0,
                'attribute_list_id' => NULL,
                'unit_id' => 16,
                'data_type_id' => 6,
                'user_id' => 1,
                'odoo_name' => NULL,
                'sort' => 22,
                'created_at' => NULL,
                'updated_at' => '2024-04-20 12:27:11',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'var-size-m',
                'comment' => '<p>Size in Meters. Variant index attribute</p>',
                'required' => 0,
                'attribute_list_id' => NULL,
                'unit_id' => 2,
                'data_type_id' => 5,
                'user_id' => 1,
            'odoo_name' => 'Taille (m)',
                'sort' => 23,
                'created_at' => NULL,
                'updated_at' => '2024-04-20 12:27:11',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'var-size-cm',
                'comment' => '<p>Size in Centimeter - Variant index attribute</p>',
                'required' => 0,
                'attribute_list_id' => NULL,
                'unit_id' => 3,
                'data_type_id' => 5,
                'user_id' => 1,
            'odoo_name' => 'Taille (cm)',
                'sort' => 24,
                'created_at' => '2023-09-28 21:16:38',
                'updated_at' => '2024-04-20 12:27:11',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'var-size-mm',
                'comment' => '<p>Size in Milimeter - Variant index attribute</p>',
                'required' => 0,
                'attribute_list_id' => NULL,
                'unit_id' => 4,
                'data_type_id' => 5,
                'user_id' => 1,
            'odoo_name' => 'Taille (mm)',
                'sort' => 25,
                'created_at' => '2023-09-28 21:17:49',
                'updated_at' => '2024-04-20 12:27:11',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'var-surface-m2',
                'comment' => '<p>Surface in Square Meters - Variant index attribute</p>',
                'required' => 0,
                'attribute_list_id' => NULL,
                'unit_id' => 7,
                'data_type_id' => 5,
                'user_id' => 1,
            'odoo_name' => 'Surface (m2)',
                'sort' => 26,
                'created_at' => '2023-09-28 21:18:58',
                'updated_at' => '2024-04-20 12:27:11',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'var-surface-cm2',
                'comment' => '<p>Surface in Square Centimeter - Variant index attribute</p>',
                'required' => 0,
                'attribute_list_id' => NULL,
                'unit_id' => 20,
                'data_type_id' => 5,
                'user_id' => 1,
            'odoo_name' => 'Surface (cm2)',
                'sort' => 27,
                'created_at' => '2023-09-28 21:19:38',
                'updated_at' => '2024-04-20 12:27:11',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'var-volume-l',
                'comment' => '<p>Volume in Liters - Variant index attribute</p>',
                'required' => 0,
                'attribute_list_id' => NULL,
                'unit_id' => 9,
                'data_type_id' => 5,
                'user_id' => 1,
            'odoo_name' => 'Volume (L)',
                'sort' => 28,
                'created_at' => '2023-09-28 21:21:44',
                'updated_at' => '2024-04-20 12:27:11',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'var-size-ft',
                'comment' => '<p>Size in Feets - Variant index attribute</p>',
                'required' => 0,
                'attribute_list_id' => NULL,
                'unit_id' => 12,
                'data_type_id' => 12,
                'user_id' => 1,
            'odoo_name' => 'Taille (pieds)',
                'sort' => 29,
                'created_at' => '2023-09-28 21:22:35',
                'updated_at' => '2024-04-20 12:27:11',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'var-size-inch',
                'comment' => '<p>Size in Inches - Variant index attribute</p>',
                'required' => 0,
                'attribute_list_id' => NULL,
                'unit_id' => 11,
                'data_type_id' => 13,
                'user_id' => 1,
            'odoo_name' => 'Taille (pouces)',
                'sort' => 30,
                'created_at' => '2023-09-28 21:23:03',
                'updated_at' => '2024-04-20 12:27:11',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'var-boot-size-fr',
            'comment' => '<p>Boot size in French notation (35-36-..43-44) - Variant index attribute</p>',
                'required' => 0,
                'attribute_list_id' => NULL,
                'unit_id' => 1,
                'data_type_id' => 4,
                'user_id' => 1,
            'odoo_name' => 'Pointure (Fr)',
                'sort' => 32,
                'created_at' => '2023-09-28 21:24:04',
                'updated_at' => '2024-04-20 12:27:11',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'var-boot-size-uk',
            'comment' => '<p>Boot size in Uk notation (6-6.5-7 ... 10-10.5) - Variant index attribute Only integer value or x.5 value</p>',
                'required' => 0,
                'attribute_list_id' => NULL,
                'unit_id' => 1,
                'data_type_id' => 5,
                'user_id' => 1,
            'odoo_name' => 'Pointure (Uk)',
                'sort' => 33,
                'created_at' => '2023-09-28 21:26:02',
                'updated_at' => '2024-04-20 12:27:11',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'var-boot-size-us',
            'comment' => '<p>Boot size in Us notation (6-6.5-7 ... 10-10.5) - Variant index attribute Only integer value or x.5 value</p>',
                'required' => 0,
                'attribute_list_id' => NULL,
                'unit_id' => 1,
                'data_type_id' => 5,
                'user_id' => 1,
            'odoo_name' => 'Pointure (Us)',
                'sort' => 34,
                'created_at' => '2023-09-28 21:27:29',
                'updated_at' => '2024-04-20 12:27:11',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'var-boot-size-mondo',
            'comment' => '<p>Boot size in Mondopoint (25-25.5-26 ... 28-28.5-29) - Variant index attribute Only integer value or x.5 value This represents the length of the foot in centimeters</p>',
                'required' => 0,
                'attribute_list_id' => NULL,
                'unit_id' => 1,
                'data_type_id' => 5,
                'user_id' => 1,
            'odoo_name' => 'Pointure (mondo)',
                'sort' => 35,
                'created_at' => '2023-09-28 21:28:38',
                'updated_at' => '2024-04-20 12:27:11',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'var-item-nb',
                'comment' => '<p>Item number - Variant index attribute Various usage</p>',
                'required' => 0,
                'attribute_list_id' => NULL,
                'unit_id' => 1,
                'data_type_id' => 4,
                'user_id' => 1,
                'odoo_name' => 'Repère',
                'sort' => 36,
                'created_at' => '2023-09-28 21:39:35',
                'updated_at' => '2024-04-20 12:27:11',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'var-weight-kg',
                'comment' => 'Weight in Kilogram - Variant index attribute',
                'required' => 0,
                'attribute_list_id' => NULL,
                'unit_id' => 5,
                'data_type_id' => 5,
                'user_id' => 1,
                'odoo_name' => NULL,
                'sort' => 37,
                'created_at' => '2023-09-28 21:40:34',
                'updated_at' => '2024-04-20 12:27:11',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'var-weight-g',
                'comment' => '<p>Weight in grams - Variant index attribute</p>',
                'required' => 0,
                'attribute_list_id' => NULL,
                'unit_id' => 6,
                'data_type_id' => 5,
                'user_id' => 1,
            'odoo_name' => 'Poids (g)',
                'sort' => 38,
                'created_at' => '2023-09-28 21:41:12',
                'updated_at' => '2024-04-20 12:27:11',
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'var-color',
                'comment' => '<p>Color - Variant index attribute</p>
<p>The color attribute is representing the main (dominent) color for the variant. You can\'t provide a color set for one variant</p>',
                'required' => 0,
                'attribute_list_id' => 1,
                'unit_id' => NULL,
                'data_type_id' => 1,
                'user_id' => 1,
                'odoo_name' => 'Couleur',
                'sort' => 39,
                'created_at' => '2023-09-28 21:41:56',
                'updated_at' => '2024-04-20 12:27:11',
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'var-size-wear-eu',
            'comment' => '<p>Clothes EU sizing (36-38-40-42) - Variant index attribute</p>',
                'required' => 0,
                'attribute_list_id' => 5,
                'unit_id' => NULL,
                'data_type_id' => 1,
                'user_id' => 1,
                'odoo_name' => 'Taille Wear',
                'sort' => 40,
                'created_at' => '2023-09-28 21:42:35',
                'updated_at' => '2024-04-20 12:27:11',
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'var-size-wear-us',
            'comment' => '<p>Clothes US sizing (2-4-6-8) - Variant index attribute</p>',
                'required' => 0,
                'attribute_list_id' => 7,
                'unit_id' => NULL,
                'data_type_id' => 1,
                'user_id' => 1,
                'odoo_name' => 'Taille Wear',
                'sort' => 41,
                'created_at' => '2023-09-28 21:43:43',
                'updated_at' => '2024-04-20 12:27:11',
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'var-size-wear-uk',
            'comment' => '<p>Clothes UK sizing (2-4-6-8) - Variant index attribute</p>',
                'required' => 0,
                'attribute_list_id' => 6,
                'unit_id' => NULL,
                'data_type_id' => 1,
                'user_id' => 1,
                'odoo_name' => 'Taille Wear',
                'sort' => 42,
                'created_at' => '2023-09-28 21:44:26',
                'updated_at' => '2024-04-20 12:27:11',
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'var-size-wear-int',
            'comment' => '<p>Clothes International sizing (XXS-XS... L-XL-XXL) - Variant index attribute</p>',
                'required' => 0,
                'attribute_list_id' => 4,
                'unit_id' => NULL,
                'data_type_id' => 1,
                'user_id' => 1,
                'odoo_name' => 'Taille Wear',
                'sort' => 43,
                'created_at' => '2023-09-28 21:45:10',
                'updated_at' => '2024-04-20 12:27:11',
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'uom',
            'comment' => 'Tells how product quantity is managed in stock (unit if not defined)',
                'required' => 0,
                'attribute_list_id' => 8,
                'unit_id' => NULL,
                'data_type_id' => 1,
                'user_id' => 1,
                'odoo_name' => NULL,
                'sort' => 14,
                'created_at' => '2023-10-04 12:28:07',
                'updated_at' => '2024-04-20 12:27:11',
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'logistic-qty',
                'comment' => 'tells how is handled product from logistics
if uom is "package", quantity in each package
id uom us "unit", quantity by carton',
                'required' => 0,
                'attribute_list_id' => NULL,
                'unit_id' => 1,
                'data_type_id' => 4,
                'user_id' => 1,
                'odoo_name' => NULL,
                'sort' => 15,
                'created_at' => '2023-10-04 12:30:46',
                'updated_at' => '2024-04-20 12:27:11',
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'supplier',
                'comment' => '<p> This name has to be the one of the supplier, but not the one of Brand<br/>Exemple : "Boards and More" but not "Duotone".</p>',
                'required' => 1,
                'attribute_list_id' => 9,
                'unit_id' => NULL,
                'data_type_id' => 1,
                'user_id' => 1,
                'odoo_name' => NULL,
                'sort' => 4,
                'created_at' => '2023-10-12 21:10:56',
                'updated_at' => '2024-04-20 12:27:11',
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'var-size-dble',
                'comment' => '<p>Taille double</p>',
                'required' => 0,
                'attribute_list_id' => NULL,
                'unit_id' => 1,
                'data_type_id' => 14,
                'user_id' => 1,
                'odoo_name' => 'Taille double',
                'sort' => 31,
                'created_at' => '2024-01-04 13:51:49',
                'updated_at' => '2024-04-20 12:27:11',
            ),
            41 => 
            array (
                'id' => 43,
                'name' => 'discount-b2b-pc',
                'comment' => '<p>Discounted percent on b2b price excluding VAT. This can be used to store client specific discount, volume discount, year discount etc.</p><p>Used if discount-b2b is not filled</p><p>1.0 is for 100% discount, 0.2 is for 20% discount</p>',
                'required' => 0,
                'attribute_list_id' => NULL,
                'unit_id' => 1,
                'data_type_id' => 11,
                'user_id' => 1,
                'odoo_name' => NULL,
                'sort' => 21,
                'created_at' => '2024-02-08 17:35:29',
                'updated_at' => '2024-04-20 12:27:11',
            ),
            42 => 
            array (
                'id' => 44,
                'name' => 'custom-code',
                'comment' => NULL,
                'required' => 0,
                'attribute_list_id' => NULL,
                'unit_id' => 1,
                'data_type_id' => 2,
                'user_id' => 1,
                'odoo_name' => NULL,
                'sort' => 19,
                'created_at' => '2024-04-20 12:26:43',
                'updated_at' => '2024-04-20 12:27:11',
            ),
        ));
        
        
    }
}