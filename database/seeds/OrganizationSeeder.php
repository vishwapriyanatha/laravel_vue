<?php

use Illuminate\Database\Seeder;
use App\Organization;
use Carbon\Carbon;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('organizations')->delete();
        $json = \File::get("database/data/organizations.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            Organization::create(array(
                'id' => $obj->_id,
                'url' => $obj->url,
                'external_id' => $obj->external_id,
                'name' => $obj->name,
                'domain_names' => $obj->domain_names,
                'details' => $obj->details,
                'shared_tickets' => $obj->shared_tickets,
                'tags' => $obj->tags,
                'created_at' => Carbon::parse($obj->created_at)->toDateTimeString(),
            ));
        }
    }
}
