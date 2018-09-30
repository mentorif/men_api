<?php

use Illuminate\Database\Seeder;

class FunationalAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('functional_area_group')->insert([
            [
                'id' => 1,
                'name' => 'Accounting and Finance'
            ],
            [
                'id' => 2,
                'name' => 'Getting Started',
            ],
            [
                'id' => 3,
                'name' => 'Human Resources'
            ],
            [
                'id' => 4,
                'name' => 'International'
            ],
            [
                'id' => 5,
                'name' => 'Law & Legal'
            ],
            [
                'id' => 6,
                'name' => 'Management'
            ],
            [
                'id' => 7,
                'name' => 'Marketing'
            ],
            [
                'id' => 8,
                'name' => 'Operations'
            ],
            [
                'id' => 9,
                'name' => 'Sales'
            ],
            [
                'id' => 10,
                'name' => 'Sustainability'
            ],
            [
                'id' => 11,
                'name' => 'Technology & Internet'
            ],
        ]);
        DB::table('functional_area')->insert([
            ["name" => "Accounting",
                "functional_group_id" => 1,"shown_order" => 1],
            ["name" => "Audits",
                "functional_group_id" => 1,"shown_order" => 1],
            ["name" => "Bookkeeping",
                "functional_group_id" => 1,"shown_order" => 1],
            ["name" => "Budgeting",
                "functional_group_id" => 1,"shown_order" => 1],
            ["name" => "Cash Flow",
                "functional_group_id" => 1,"shown_order" => 1],
            ["name" => "Financial Planning",
                "functional_group_id" => 1,"shown_order" => 1],
            ["name" => "Loans and Financing",
                "functional_group_id" => 1,"shown_order" => 1],
            ["name" => "Taxes",
                "functional_group_id" => 1,"shown_order" => 1],
            ["name" => "Other",
                "functional_group_id" => 1,
                "shown_order" => 2
            ],

            ["name" => "Business Planning",
                "functional_group_id" => 2,"shown_order" => 1],
            ["name" => "Franchising",
                "functional_group_id" => 2,"shown_order" => 1],
            ["name" => "Getting Started",
                "functional_group_id" => 2,"shown_order" => 1],
            ["name" => "Legal Structure",
                "functional_group_id" => 2,"shown_order" => 1],
            ["name" => "Location and Zoning",
                "functional_group_id" => 2,"shown_order" => 1],
            ["name" => "Other",
                "functional_group_id" => 2,
                "shown_order" => 2
            ],

            ["name" => "Compensation and Benefits",
                "functional_group_id" => 3,"shown_order" => 1],
            ["name" => "Contractors and Consultants",
                "functional_group_id" => 3,"shown_order" => 1],
            ["name" => "Employee Management",
                "functional_group_id" => 3,"shown_order" => 1],
            ["name" => "Employee Training",
                "functional_group_id" => 3,"shown_order" => 1],
            ["name" => "Personnel Policies",
                "functional_group_id" => 3,"shown_order" => 1],
            ["name" => "Staffing and Recruiting",
                "functional_group_id" => 3,"shown_order" => 1],
            ["name" => "Volunteer Management",
                "functional_group_id" => 3,"shown_order" => 1],
            ["name" => "Other",
                "functional_group_id" => 3,
                "shown_order" => 2
            ],

            ["name" => "Customs and Tariffs",
                "functional_group_id" => 4,"shown_order" => 1],
            ["name" => "Exporting and Importing",
                "functional_group_id" => 4,"shown_order" => 1],
            ["name" => "Global Markets",
                "functional_group_id" => 4,"shown_order" => 1],
            ["name" => "Outsourcing",
                "functional_group_id" => 4,"shown_order" => 1],
            ["name" => "Other",
                "functional_group_id" => 4,
                "shown_order" => 2
            ],
            
            ["name" => "Contracts",
                "functional_group_id" => 5,"shown_order" => 1],
            ["name" => "Employment/Labor Law",
                "functional_group_id" => 5,"shown_order" => 1],
            ["name" => "Immigration Law",
                "functional_group_id" => 5,"shown_order" => 1],
            ["name" => "Intellectual Property",
                "functional_group_id" => 5,"shown_order" => 1],
            ["name" => "Property Law",
                "functional_group_id" => 5,"shown_order" => 1],
            ["name" => "Tax Law",
                "functional_group_id" => 5,"shown_order" => 1],
            ["name" => "Other",
                "functional_group_id" => 5,
                "shown_order" => 2
            ],

            ["name" => "Board Development",
                "functional_group_id" => 6,"shown_order" => 1],
            ["name" => "Business Insurance",
                "functional_group_id" => 6,"shown_order" => 1],
            ["name" => "Business Strategy",
                "functional_group_id" => 6,"shown_order" => 1],
            ["name" => "Fundraising",
                "functional_group_id" => 6,"shown_order" => 1],
            ["name" => "Growth and Development",
                "functional_group_id" => 6,"shown_order" => 1],
            ["name" => "Leadership",
                "functional_group_id" => 6,"shown_order" => 1],
            ["name" => "Planning and Goal Setting",
                "functional_group_id" => 6,"shown_order" => 1],
            ["name" => "Project Management",
                "functional_group_id" => 6,"shown_order" => 1],
            ["name" => "Work-Life Balance",
                "functional_group_id" => 6,"shown_order" => 1],
            ["name" => "Other",
                "functional_group_id" => 6,
                "shown_order" => 2
            ],

            ["name" => "Advertising and Promotion",
                "functional_group_id" => 7,"shown_order" => 1],
            ["name" => "Branding and Identity",
                "functional_group_id" => 7,"shown_order" => 1],
            ["name" => "Business Development",
                "functional_group_id" => 7,"shown_order" => 1],
            ["name" => "Distribution",
                "functional_group_id" => 7,"shown_order" => 1],
            ["name" => "Market Research",
                "functional_group_id" => 7,"shown_order" => 1],
            ["name" => "Marketing Collateral",
                "functional_group_id" => 7,"shown_order" => 1],
            ["name" => "Marketing Strategy",
                "functional_group_id" => 7,"shown_order" => 1],
            ["name" => "Pricing",
                "functional_group_id" => 7,"shown_order" => 1],
            ["name" => "Product Development",
                "functional_group_id" => 7,"shown_order" => 1],
            ["name" => "Public Relations and Media",
                "functional_group_id" => 7,"shown_order" => 1],
            ["name" => "Social Media",
                "functional_group_id" => 7,"shown_order" => 1],
            ["name" => "Web Marketing",
                "functional_group_id" => 7,"shown_order" => 1],
            ["name" => "Writing and Editing",
                "functional_group_id" => 7,"shown_order" => 1],
            ["name" => "Other",
                "functional_group_id" => 7,
                "shown_order" => 2
            ],

            ["name" => "Inventory Management",
                "functional_group_id" => 8,"shown_order" => 1],
            ["name" => "Logistics",
                "functional_group_id" => 8,"shown_order" => 1],
            ["name" => "Manufacturing",
                "functional_group_id" => 8,"shown_order" => 1],
            ["name" => "Packaging and Labeling",
                "functional_group_id" => 8,"shown_order" => 1],
            ["name" => "Process Improvement",
                "functional_group_id" => 8,"shown_order" => 1],
            ["name" => "Procurement and Vendors",
                "functional_group_id" => 8,"shown_order" => 1],
            ["name" => "Program Design &amp; Evaluation",
                "functional_group_id" => 8,"shown_order" => 1],
            ["name" => "Quality Management",
                "functional_group_id" => 8,"shown_order" => 1],
            ["name" => "Transportation and Delivery",
                "functional_group_id" => 8,"shown_order" => 1],
            ["name" => "Other",
                "functional_group_id" => 8,
                "shown_order" => 2
            ],

            ["name" => "Customer Service and CRM",
                "functional_group_id" => 9,"shown_order" => 1],
            ["name" => "Government Contracts",
                "functional_group_id" => 9,"shown_order" => 1],
            ["name" => "Lead Generation",
                "functional_group_id" => 9,"shown_order" => 1],
            ["name" => "Retail and Consumer Sales",
                "functional_group_id" => 9,"shown_order" => 1],
            ["name" => "Selling Products",
                "functional_group_id" => 9,"shown_order" => 1],
            ["name" => "Selling Services",
                "functional_group_id" => 9,"shown_order" => 1],
            ["name" => "Wholesale and B2B Sales",
                "functional_group_id" => 9,"shown_order" => 1],
            ["name" => "Other",
                "functional_group_id" => 9,
                "shown_order" => 2
            ],

            ["name" => "Energy Efficiency",
                "functional_group_id" => 10,"shown_order" => 1],
            ["name" => "Green Business",
                "functional_group_id" => 10,"shown_order" => 1],
            ["name" => "Green Products",
                "functional_group_id" => 10,"shown_order" => 1],
            ["name" => "Other",
                "functional_group_id" => 10,
                "shown_order" => 2
            ],

            ["name" => "E-Commerce",
                "functional_group_id" => 11,"shown_order" => 1],
            ["name" => "Managing Technology",
                "functional_group_id" => 11,"shown_order" => 1],
            ["name" => "Technology Planning",
                "functional_group_id" => 11,"shown_order" => 1],
            ["name" => "Telecommunications",
                "functional_group_id" => 11,"shown_order" => 1],
            ["name" => "Website Design",
                "functional_group_id" => 11,"shown_order" => 1],
            ["name" => "Other",
                "functional_group_id" => 11,
                "shown_order" => 2
            ],
        ]);
    }

}
