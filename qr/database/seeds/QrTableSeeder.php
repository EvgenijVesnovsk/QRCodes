<?php

use Illuminate\Database\Seeder;

class QrTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert('INSERT INTO `qr_tbl` (`name`, `param`, `created_at`, `updated_at`) VALUES (?, ?, NOW(), NOW())', [
            'Медичи',
            '{"city": "Новороссийск", "source": "https://medichi-novoros.ru/", "product": "Медицинский центр", "campaing": "ООО Медичи"}'
        ]);
        DB::insert('INSERT INTO `qr_tbl` (`name`, `param`, `created_at`, `updated_at`) VALUES (?, ?, NOW(), NOW())', [
            'Безварикоза',
            '{"city": "Новороссийск", "source": "http://medichfp.beget.tech/", "product": "Лечение варикоза", "campaing": "ООО Медичи"}'
        ]);
        DB::insert('INSERT INTO `qr_tbl` (`name`, `param`, `created_at`, `updated_at`) VALUES (?, ?, NOW(), NOW())', [
            'КТ',
            '{"city": "Новороссийск", "source": "https://kt-novoros.ru/", "product": "Компьютерный томограф", "campaing": "ООО Медичи"}'
        ]);
        DB::insert('INSERT INTO `qr_tbl` (`name`, `param`, `created_at`, `updated_at`) VALUES (?, ?, NOW(), NOW())', [
            'Housesitter',
            '{"city": "Новороссийск", "source": "https://housesitter.ru/", "product": "Домоводство", "campaing": "Профессия домохозяйка"}'
        ]);
        DB::insert('INSERT INTO `qr_tbl` (`name`, `param`, `created_at`, `updated_at`) VALUES (?, ?, NOW(), NOW())', [
            'Почта mail.ru',
            '{"city": "Москва", "source": "https://mail.ru/", "product": "Электронная почта", "campaing": "ООО Mail Group"}'
        ]);
    }
}
