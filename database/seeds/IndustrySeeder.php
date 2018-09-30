<?php

use Illuminate\Database\Seeder;

class IndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('industry_master')->insert([
            ["name" =>"Accounting and Tax Services"],
            ["name" =>"Agriculture"],
            ["name" =>"Animals and Pets"],
            ["name" =>"Architecture and Engineering"],
            ["name" =>"Artisan and Craft Work"],
            ["name" =>"Auto and Bike Mechanic"],
            ["name" =>"Beauty"],
            ["name" =>"Bookstore"],
            ["name" =>"Business Consulting and Coaching"],
            ["name" =>"Childcare"],
            ["name" =>"Cleaning Services"],
            ["name" =>"Construction and Contracting"],
            ["name" =>"Counseling and Mental Health"],
            ["name" =>"Digital Marketing and Social Media"],
            ["name" =>"Disability Services"],
            ["name" =>"Distribution and Logistics"],
            ["name" =>"E-Commerce"],
            ["name" =>"Education"],
            ["name" =>"Elder and Home Health Care"],
            ["name" =>"Entertainment and Events"],
            ["name" =>"Export and Import"],
            ["name" =>"Fashion"],
            ["name" =>"Financial Services and Insurance"],
            ["name" =>"Flowers and Gifts"],
            ["name" =>"Food and Grocery"],
            ["name" =>"Forestry"],
            ["name" =>"Furniture"],
            ["name" =>"Graphic and Web Design"],
            ["name" =>"Health and Wellness"],
            ["name" =>"Information Technology Services"],
            ["name" =>"Jewelry and Luxury Goods"],
            ["name" =>"Landscaping"],
            ["name" =>"Laundry and Tailoring"],
            ["name" =>"Legal Services"],
            ["name" =>"Manufacturing"],
            ["name" =>"Marketing and Advertising"],
            ["name" =>"Media and Publishing"],
            ["name" =>"Nonprofit and Social Enterprise"],
            ["name" =>"Performing Arts"],
            ["name" =>"Personal and Executive Assistance"],
            ["name" =>"Photography and A/V Services"],
            ["name" =>"Public Relations"],
            ["name" =>"Real Estate"],
            ["name" =>"Recreation and Outdoor Fitness"],
            ["name" =>"Recruiting and Staffing"],
            ["name" =>"Restaurant and Catering"],
            ["name" =>"Retail"],
            ["name" =>"Sustainability"],
            ["name" =>"Taxi and Limo Services"],
            ["name" =>"Translation and Localization"],
            ["name" =>"Travel and Hospitality"],
            ["name" =>"Veterinary"],
            ["name" =>"Web and Technology"],
            ["name" =>"Wine and Spirits"],
            ["name" =>"Writing and Editing"]
        ]);
    }
}
