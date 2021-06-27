<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Weidner\Goutte\GoutteFacade as GoutteFacade;
use Goutte\Client;
class Scraping extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:scraping';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    
    public function handle()
    {
        // testURL
        // 'https://www.amazon.co.jp/gp/s/ref=amb_link_1?ie=UTF8&field-enc-merchantbin=AN1VRQENFRJN5%7CA1RJCHJCQT9WV5&field-launch-date=30x-0x&node=2494234051&pf_rd_m=AN1VRQENFRJN5&pf_rd_s=merchandised-search-left-4&pf_rd_r=6CWTB56SQ1GK6RA30VVV&pf_rd_r=6CWTB56SQ1GK6RA30VVV&pf_rd_t=101&pf_rd_p=f72beb25-a5bc-4658-9aa6-7d92f73c2c8b&pf_rd_p=f72beb25-a5bc-4658-9aa6-7d92f73c2c8b&pf_rd_i=637394'
        // nmk_kisyu=%25E3%2582%25B0%25E3%2583%25AC%25E3%2583%25BC%25E3%2583%2588%25E3%2582%25AD%25E3%2583%25B3%25E3%2582%25B0%25E3%2583%258F%25E3%2583%258A%25E3%2583%258F%25E3%2583%258A-30
        $crawler = GoutteFacade::request('GET', 'https://p-tora.com/toukai/hall/index.html?no=12328');

        $client = new Client();

        // $form = $crawler->filter('#form')->first()->form();
        $form = $crawler->filter('form#item_form')->form();

        // $searchParameters = [
        //                         'item_sis' => '1365',
        //                         'item_item_name' => '%A5%DE%A5%A4%A5%B8%A5%E3%A5%B0%A5%E9%A1%BC%AD%B7KD',
        //                     ];
        

        $form['sis'] = '1365';
        $form['item_name'] = '%A5%DE%A5%A4%A5%B8%A5%E3%A5%B0%A5%E9%A1%BC%AD%B7KD';

        $crawler = $client->submit($form);
        $html = $crawler->html();
        
        //データ格納配列
        // $datas = array();
        // $dom = $crawler->filter('td.td1')->each(function($element)use ($data_array){
        //     // dd($element);
        //     // $el = $element->text()."\n";
        //     echo $el = $element->text();
        //     array_push($data_array,$el);
        // });
        // var_dump($data_array);

        //一次元
        $data_array = array();
        $lix = 0;
        $dom = $crawler->filter('td.td1');
        $dom->each(function ($node) use (&$lix, &$data_array){
            $el = $node->text();
            if($el!='')array_push($data_array,$el);
        });

        // var_dump($data_array);

        $chunks = array_chunk($data_array,5);
        var_dump($chunks);
    }
}
