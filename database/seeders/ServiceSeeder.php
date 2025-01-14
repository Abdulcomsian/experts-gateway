<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            ["title" => "Corporate Law", "image" => "service1.png", "description" => "Providing legal guidance for businesses and corporations.", "user_id" => 1],
            ["title" => "Criminal Defense", "image" => "service1.png", "description" => "Defending clients accused of criminal offenses.", "user_id" => 2],
            ["title" => "Family Law", "image" => "service1.png", "description" => "Handling divorce, child custody, and family-related legal matters.", "user_id" => 3],
            ["title" => "Intellectual Property", "image" => "service1.png", "description" => "Protecting inventions, trademarks, and creative works.", "user_id" => 4],
            ["title" => "Employment Law", "image" => "service1.png", "description" => "Addressing legal issues in the workplace.", "user_id" => 5],
            ["title" => "Real Estate Law", "image" => "service1.png", "description" => "Managing property transactions and disputes.", "user_id" => 6],
            ["title" => "Personal Injury", "image" => "service1.png", "description" => "Representing clients in cases of personal injury claims.", "user_id" => 7],
            ["title" => "Bankruptcy Law", "image" => "service1.png", "description" => "Assisting clients in bankruptcy filings and debt relief.", "user_id" => 8],
            ["title" => "Immigration Law", "image" => "service1.png", "description" => "Helping clients navigate immigration processes and visas.", "user_id" => 9],
            ["title" => "Tax Law", "image" => "service1.png", "description" => "Providing advice and representation on tax-related matters.", "user_id" => 10],
            ["title" => "Environmental Law", "image" => "service1.png", "description" => "Focusing on laws related to environmental protection.", "user_id" => 11],
            ["title" => "Medical Malpractice", "image" => "service1.png", "description" => "Handling cases involving medical negligence.", "user_id" => 12],
            ["title" => "Consumer Protection", "image" => "service1.png", "description" => "Advocating for consumer rights and protections.", "user_id" => 12],
            ["title" => "Insurance Law", "image" => "service1.png", "description" => "Dealing with disputes between policyholders and insurers.", "user_id" => 12],
            ["title" => "Contract Law", "image" => "service1.png", "description" => "Drafting and enforcing legal agreements and contracts.", "user_id" => 12]
        ];
        
        
        foreach($services as $service){
            Service::create($service);
        }
    }
}
