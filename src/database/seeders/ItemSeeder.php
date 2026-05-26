<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item1 = Item::create([
            'user_id' => '1',
            'name' => '腕時計',
            'brand' => 'Rolex',
            'price' => '15000',
            'explain' => 'スタイリッシュなデザインのメンズ腕時計',
            'picture' => 'images/CSUeoXJudEitfsNHHlXdR5CDilfeLyZdB5PgEyU2.jpg',
            'condition_id' => '1',
        ]);

        $item1->categories()->attach([1, 5, 12]);

        $item2 = Item::create([
            'user_id' => '1',
            'name' => 'HDD',
            'brand' => '西芝',
            'price' => '5000',
            'explain' => '高速で信頼性の高いハードディスク',
            'picture' => 'images/5aFwmovnrDLFFq9Zy62nIq96HqidlrMMskLxuvPF.jpg',
            'condition_id' => '2',
        ]);

        $item2->categories()->attach([2]);

        $item3 = Item::create([
            'user_id' => '2',
            'name' => '玉ねぎ3束',
            'brand' => '',
            'price' => '300',
            'explain' => '新鮮な玉ねぎ3束のセット',
            'picture' => 'images/iCrujLO4Zutpi7i6poaNRekk7AOWzBnEJy2pZDSU.jpg',
            'condition_id' => '3',
        ]);

        $item3->categories()->attach([10]);

        $item4 = Item::create([
            'user_id' => '2',
            'name' => '革靴',
            'brand' => '',
            'price' => '4000',
            'explain' => 'クラシックなデザインの革靴',
            'picture' => 'images/3MDSWmfAim83b5PUT9CDsb35Pi8ptVC1B9w798we.jpg',
            'condition_id' => '4',
        ]);

        $item4->categories()->attach([1, 5]);

        $item5 = Item::create([
            'user_id' => '3',
            'name' => 'ノートPC',
            'brand' => '',
            'price' => '45000',
            'explain' => '高性能なノートパソコン',
            'picture' => 'images/4OMxFhVLvRHnNEJrMoYbmsA09x6Boqf7i6hVDf8d.jpg',
            'condition_id' => '1',
        ]);

        $item5->categories()->attach([2]);

        $item6 = Item::create([
            'user_id' => '3',
            'name' => 'マイク',
            'brand' => '',
            'price' => '8000',
            'explain' => '高音質のレコーディング用マイク',
            'picture' => 'images/2eGxBB9G6YGgkhHHG1aSYnZi6ciWf8HG8pZB4a7q.jpg',
            'condition_id' => '2',
        ]);

        $item6->categories()->attach([2]);

        $item7 = Item::create([
            'user_id' => '1',
            'name' => 'ショルダーバッグ',
            'brand' => '',
            'price' => '3500',
            'explain' => 'おしゃれなショルダーバッグ',
            'picture' => 'images/LZDZ5AVcz9j4xm94Vhe87Q10Qn6dcMvxDK8Yj8iU.jpg',
            'condition_id' => '3',
        ]);

        $item7->categories()->attach([1, 4]);

        $item8 = Item::create([
            'user_id' => '1',
            'name' => 'タンブラー',
            'brand' => '',
            'price' => '500',
            'explain' => '使いやすいタンブラー',
            'picture' => 'images/1Rj9RBsQYL8mcchxZwBHlwZAsfyOELxVgay5OITy.jpg',
            'condition_id' => '4',
        ]);

        $item8->categories()->attach([10]);

        $item9 = Item::create([
            'user_id' => '2',
            'name' => 'コーヒーミル',
            'brand' => 'Starbacks',
            'price' => '4000',
            'explain' => '手動のコーヒーミル',
            'picture' => 'images/3MEEEtMGRKhPraKIQq2VDlV7OD2Le28xQuQy2pnk.jpg',
            'condition_id' => '1',
        ]);

        $item9->categories()->attach([3, 10]);

        $item10 = Item::create([
            'user_id' => '2',
            'name' => 'メイクセット',
            'brand' => '',
            'price' => '2500',
            'explain' => '便利なメイクアップセット',
            'picture' => 'images/w56kTfZYEMmRaT53Kf6P9tobtfNdcH69N3yqZcgW.jpg',
            'condition_id' => '2',
        ]);

        $item10->categories()->attach([4, 6]);
    }
}
