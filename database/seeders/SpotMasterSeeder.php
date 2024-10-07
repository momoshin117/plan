<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpotMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('spot_masters')->truncate();
        
        DB::table('spot_masters')->insert([
                'category_id' => '1',
                'spot_name' => '星野リゾートトマム',
                'prefecture_id' => '1',
                'adress' =>'勇払郡占冠村中トマム',
                'bath' => '1',
                'foot' => 'トマム駅から無料送迎バス5分',
                'bus' => '1',
                'hotel_food' =>'夕朝食',
                'rakuten_hotel_id' => '30110',
        ]);
         
        DB::table('spot_masters')->insert([
                'category_id' => '1',
                'spot_name' => 'ラビスタ函館ベイ',
                'prefecture_id' => '1',
                'adress' =>'函館市豊川町12-6',
                'bath' => '1',
                'foot' => 'JR函館駅徒歩15分',
                'bus' => '0',
                'hotel_food' =>'夕朝食',
                'rakuten_hotel_id' => '69295',
        ]);
        
        DB::table('spot_masters')->insert([
                'category_id' => '1',
                'spot_name' => '日光金谷ホテル',
                'prefecture_id' => '9',
                'adress' =>'日光市上鉢石町1300',
                'bath' => '1',
                'foot' => '東武・ＪＲ日光駅よりバス約５分',
                'bus' => '0',
                'hotel_food' =>'夕朝食',
                'rakuten_hotel_id' => '28760',
        ]);
        
        DB::table('spot_masters')->insert([
                'category_id' => '1',
                'spot_name' => '東京プリンスホテル',
                'prefecture_id' => '13',
                'adress' =>'港区芝公園3-3-1',
                'bath' => '0',
                'foot' => '都営地下鉄三田線御成門駅から徒歩1分',
                'bus' => '0',
                'hotel_food' =>'夕朝食',
                'rakuten_hotel_id' => '28506',
        ]);
        
        DB::table('spot_masters')->insert([
                'category_id' => '1',
                'spot_name' => 'ヨコハマグランドインターコンチネンタルホテル',
                'prefecture_id' => '14',
                'adress' =>'横浜市西区みなとみらい1-1-1',
                'bath' => '0',
                'foot' => 'みなとみらい駅から徒歩約5分、桜木町駅から徒歩約10分',
                'bus' => '0',
                'hotel_food' =>'夕朝食',
                'rakuten_hotel_id' => '5731',
        ]);
        
        DB::table('spot_masters')->insert([
                'category_id' => '1',
                'spot_name' => '星のや軽井沢',
                'prefecture_id' => '17',
                'adress' =>'北佐久郡軽井沢町長倉2148',
                'bath' => '1',
                'foot' => '北陸新幹線 軽井沢駅 / しなの鉄道 中軽井沢駅よりシャトルバスまたはタクシーで約15分',
                'bus' => '1',
                'hotel_food' =>'夕朝食',
                'rakuten_hotel_id' => '172989',
        ]);
        
        DB::table('spot_masters')->insert([
                'category_id' => '1',
                'spot_name' => '三井ガーデンホテル京都四条',
                'prefecture_id' => '26',
                'adress' =>'京都市下京区西洞院通四条下ル妙伝寺町707-1',
                'bath' => '1',
                'foot' => '阪急「烏丸」駅・地下鉄「四条」駅より徒歩6分',
                'bus' => '0',
                'hotel_food' =>'朝食のみ',
                'rakuten_hotel_id' => '1787',
        ]);
        
        DB::table('spot_masters')->insert([
                'category_id' => '1',
                'spot_name' => 'シェラトン・グランデ・オーシャンリゾート',
                'prefecture_id' => '45',
                'adress' =>'宮崎市山崎町浜山',
                'bath' => '0',
                'foot' => '宮崎駅から車15分',
                'bus' => '0',
                'hotel_food' =>'夕朝食',
                'rakuten_hotel_id' => '5173',
        ]);
        
        DB::table('spot_masters')->insert([
                'category_id' => '1',
                'spot_name' => 'ホテル日航アリビラ',
                'prefecture_id' => '47',
                'adress' =>'中頭郡読谷村字儀間600',
                'bath' => '0',
                'foot' => '那覇空港より車で約70分',
                'bus' => '0',
                'hotel_food' =>'夕朝食',
                'rakuten_hotel_id' => '11052',
        ]);
        
        DB::table('spot_masters')->insert([
                'category_id' => '1',
                'spot_name' => 'ハレクラニ沖縄',
                'prefecture_id' => '47',
                'adress' =>'国頭郡恩納村名嘉真1967-1',
                'bath' => '1',
                'foot' => '那覇空港より車で約75分',
                'bus' => '0',
                'hotel_food' =>'夕朝食',
                'rakuten_hotel_id' => '172611',
        ]);
        
        DB::table('spot_masters')->insert([
                'category_id' => '2',
                'spot_name' => 'ラッキーピエロ ベイエリア本店',
                'prefecture_id' => '1',
                'adress' =>'函館市末広町23-18',
                'holiday' => 'なし',
                'open_time' => '10:00～21:00',
                'seat' => '32席',
                'parking_car_id' =>'1',
                'foot' => '函館市電　末広町より徒歩3分',
                'bus' => '0',
                'latitude'=>'41.76595603000333',
                'longitude'=>'140.71536194970594',
        ]);
        
        DB::table('spot_masters')->insert([
                'category_id' => '2',
                'spot_name' => '山元麺蔵',
                'prefecture_id' => '26',
                'adress' =>'京都市左京区岡崎南御所町34',
                'holiday' => '木曜・第4水曜',
                'open_time' => '11:00～(なくなり次第終了)',
                'seat' => '18席',
                'parking_car_id' =>'2',
                'foot' => '京都市営地下鉄東西線「東山」駅(1番出口)より、徒歩11分',
                'bus' => '0',
                'latitude'=>'35.01432686507781',
                'longitude'=>'135.7851337322098',
        ]);
        
        DB::table('spot_masters')->insert([
                'category_id' => '2',
                'spot_name' => 'バンタカフェ',
                'prefecture_id' => '47',
                'adress' =>'中頭郡読谷村儀間 560',
                'holiday' => 'なし',
                'open_time' => '平日：10:00～18:00、土休日：8:00～18:00',
                'seat' => '約50席',
                'parking_car_id' =>'2',
                'foot' => '徒歩不可',
                'bus' => '0',
                'latitude'=>'26.417849499668577',
                'longitude'=>'127.71399366717395',
        ]);
        
        DB::table('spot_masters')->insert([
                'category_id' => '2',
                'spot_name' => 'OKINAWA SOBA EIBUN',
                'prefecture_id' => '47',
                'adress' =>'那覇市壺屋1-5-14',
                'holiday' => 'なし',
                'open_time' => '11:00～16:00(売切れ次第終了)',
                'seat' => '24席',
                'parking_car_id' =>'1',
                'foot' => 'ゆいレール牧志駅から徒歩7分',
                'bus' => '0',
                'latitude'=>'26.21306613228727',
                'longitude'=>'127.69029357237088',
        ]);
        
         DB::table('spot_masters')->insert([
                'category_id' => '2',
                'spot_name' => '百年古家 大家',
                'prefecture_id' => '47',
                'adress' =>'名護市中山90',
                'holiday' => 'なし',
                'open_time' => '11:00～16:00、18:00～21:00',
                'seat' => '120席',
                'parking_car_id' =>'3',
                'foot' => '沖縄自動車道許田ICより車で20分',
                'bus' => '0',
                'latitude'=>'26.621178514671175',
                'longitude'=>'127.96401501840744',
        ]);
        
        DB::table('spot_masters')->insert([
                'category_id' => '3',
                'spot_name' => '函館山',
                'prefecture_id' => '1',
                'adress' =>'函館市元町19-7',
                'holiday' => '無休',
                'open_time' => '10:00～22:00',
                'entrance_fee' => '大人:1,500円、小学生:700円',
                'parking_car_id' =>'4',
                'foot' => '市電十字街電停下車徒歩10分',
                'bus' => '0',
                'latitude'=>'41.760926725531945',
                'longitude'=>'140.70391699731184',
        ]);
        
        DB::table('spot_masters')->insert([
                'category_id' => '3',
                'spot_name' => '五稜郭タワー',
                'prefecture_id' => '1',
                'adress' =>'函館市五稜郭町43-9',
                'holiday' => '無休',
                'open_time' => '9:00～18:00',
                'entrance_fee' => '大人:1,000円、中高生:750円、小学生:500円',
                'parking_car_id' =>'4',
                'foot' => '函館駅からバスで約20分',
                'bus' => '0',
                'latitude'=>'41.79476585624278',
                'longitude'=>'140.75404145396584',
        ]);
        
        DB::table('spot_masters')->insert([
                'category_id' => '3',
                'spot_name' => '八幡坂',
                'prefecture_id' => '1',
                'adress' =>'函館市末広町19',
                'holiday' => '無休',
                'open_time' => '24時間',
                'entrance_fee' => '無料',
                'parking_car_id' =>'1',
                'foot' => '市電末広町電停下車徒歩1分',
                'bus' => '0',
                'latitude'=>'41.76405322035742',
                'longitude'=>'140.71183648279958',
        ]);
        
        DB::table('spot_masters')->insert([
                'category_id' => '3',
                'spot_name' => '清水寺',
                'prefecture_id' => '26',
                'adress' =>'京都市東山区清水一丁目294',
                'holiday' => '無休',
                'open_time' => '6:00～18:00',
                'entrance_fee' => '大人:400円、小児:400円',
                'parking_car_id' =>'1',
                'foot' => '京都市交通局（市バス）「五条坂」「東山五条」徒歩10分',
                'bus' => '0',
                'latitude'=>'35.03927928077217',
                'longitude'=>'135.7846607957925',
        ]);
        
        DB::table('spot_masters')->insert([
                'category_id' => '3',
                'spot_name' => '伏見稲荷大社',
                'prefecture_id' => '26',
                'adress' =>'京都市伏見区深草藪之内町68',
                'holiday' => '無休',
                'open_time' => '24時間',
                'entrance_fee' => '無料',
                'parking_car_id' =>'4',
                'foot' => 'JR奈良線稲荷駅から徒歩すぐ',
                'bus' => '0',
                'latitude'=>'34.967861520969414',
                'longitude'=>'135.77917686714875',
        ]);
        
        DB::table('spot_masters')->insert([
                'category_id' => '3',
                'spot_name' => '金閣寺',
                'prefecture_id' => '26',
                'adress' =>'京都市北区金閣寺町1',
                'holiday' => '無休',
                'open_time' => '9:00～17:00',
                'entrance_fee' => '大人(高校生以上):400円、小中学生:300円',
                'parking_car_id' =>'4',
                'foot' => 'JR京都駅から市バスで40分',
                'bus' => '0',
                'latitude'=>'35.03955081991841',
                'longitude'=>'135.729298219281',
        ]);
        
        DB::table('spot_masters')->insert([
                'category_id' => '3',
                'spot_name' => '保津川下り',
                'prefecture_id' => '26',
                'adress' =>'亀岡市保津町下中島2',
                'holiday' => '無休',
                'open_time' => '9:00～15:00(冬季は10:00～14:30)',
                'entrance_fee' => '大人:6,000円、小学生:4,500円',
                'parking_car_id' =>'3',
                'foot' => 'JR亀岡駅から徒歩8分',
                'bus' => '0',
                'latitude'=>'35.01739970050779',
                'longitude'=>'135.58688075733457',
        ]);
        
        DB::table('spot_masters')->insert([
                'category_id' => '3',
                'spot_name' => '首里城',
                'prefecture_id' => '47',
                'adress' =>'那覇市首里金城町1-2',
                'holiday' => '無休',
                'open_time' => '8:30～20:00(時期により変動あり)',
                'entrance_fee' => '大人:400円、高校生:300円、小中学生:160円',
                'parking_car_id' =>'4',
                'foot' => 'ゆいモノレール首里駅から徒歩で15分',
                'bus' => '0',
                'latitude'=>'26.21724700459257',
                'longitude'=>'127.71956912634764',
        ]);
        
        DB::table('spot_masters')->insert([
                'category_id' => '3',
                'spot_name' => 'ウミカジテラス',
                'prefecture_id' => '47',
                'adress' =>'豊見城市瀬長174番地6',
                'holiday' => '無休',
                'open_time' => '10:00～21:00',
                'entrance_fee' => '無料',
                'parking_car_id' =>'4',
                'foot' => '那覇空港から車で約15分',
                'bus' => '0',
                'latitude'=>'26.17688173162142',
                'longitude'=>'127.64051179751098',
        ]);
        
        DB::table('spot_masters')->insert([
                'category_id' => '3',
                'spot_name' => '美ら海水族館',
                'prefecture_id' => '47',
                'adress' =>'国頭郡本部町石川424',
                'holiday' => '不定休',
                'open_time' => '8:30～18:30(時期により変動あり)',
                'entrance_fee' => '大人:2,180円、高校生:1,440円、小中学生:710円',
                'parking_car_id' =>'4',
                'foot' => '沖縄自動車道許田ICより約50分',
                'bus' => '0',
                'latitude'=>'26.694568024025163',
                'longitude'=>'127.87798090917416',
        ]);
        
    }
}
