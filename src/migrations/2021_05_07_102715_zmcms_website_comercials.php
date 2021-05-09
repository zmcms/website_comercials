<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class ZmcmsWebsiteComercials extends Migration{
	public function up(){
		$tblNamePrefix=(Config('database.prefix')??'');
		$tblName=$tblNamePrefix.'commercials';

        Schema::create($tblName, function($table){$table->string('token', 80);});
        Schema::table($tblName, function($table){$table->string('type', 10);}); // Banner, google, 
        Schema::table($tblName, function($table){$table->string('position', 20);}); //  Pozycja top, bottom, left, right, inter
        Schema::table($tblName, function($table){$table->string('name', 80);});     //  Nazwa reklamy
        Schema::table($tblName, function($table){$table->string('dateFrom', 10);});     //  Od kiedy wyświetla się rekla
        Schema::table($tblName, function($table){$table->string('dateTo', 10);});     //    Do kiedy wyświetla się rekla
        Schema::table($tblName, function($table){$table->string('link', 255)->nullable();});     // Link do reklamowanego miejsca
        Schema::table($tblName, function($table){$table->string('target', 25)->nullable();});     // Np. nowe okno?
        Schema::table($tblName, function($table){$table->string('media', 255);});     // Ścieżka do medium. Np. Pliku graficznego jpg 750x100 px
        Schema::table($tblName, function($table){$table->string('media_type', 30);});     //Nazwa reklamy
        Schema::table($tblName, function($table){$table->string('description', 255);});     //Nazwa reklamy
        Schema::table($tblName, function($table){$table->integer('click_count', false, true);});           //  Licznik kliknięć, unsigned
        Schema::table($tblName, function($table){$table->integer('view_count', false, true);});           //  Licznik kliknięć, unsigned
        Schema::table($tblName, function($table){$table->decimal('cpc', 12, 2)->nullable();});  //  Koszt za kliknięcie
        Schema::table($tblName, function($table){$table->decimal('cpv', 12, 2)->nullable();});  //  Koszt za  wyświetlenie
        Schema::table($tblName, function($table){$table->decimal('cpcq', 12, 2)->nullable();}); //  Zakontraktowana liczba kliknięć
        Schema::table($tblName, function($table){$table->decimal('cpvq', 12, 2)->nullable();}); //  Zakontraktowana liczba wyświetleń
        Schema::table($tblName, function($table){$table->string('contractors_token', 50);});    //  Koszt za  wyświetlenie
        Schema::table($tblName, function($table){$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));});
        Schema::table($tblName, function($table){$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));});
        Schema::table($tblName, function($table){$table->primary(['token',], 'commercials_primary');});
        Schema::table($tblName, function($table){$table->foreign('contractors_token')->references('token')->on('contractors')->onDelete('cascade')->onUpdate('cascade');});
	}
	public function down(){
		
	}
}
