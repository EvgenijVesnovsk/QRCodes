<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Qr extends Model
{
    protected $table = 'qr_tbl';
    
    /**
    * Добавляем QR
    * @param string $qrName <p>Название QR кода</p> json $json <p>Параметры компании</p>
    * @return boolean <p>Результат выполнения метода</p>
    */
    public static function createQr($qrName, $json) 
    {
        $result = DB::insert('INSERT INTO `qr_tbl` (`name`, `param`, `created_at`, `updated_at`) VALUES (?, ?, NOW(), NOW())', [$qrName, $json]);
        return $result;
    }
    
    /**
    * Редактируем QR
    * @param string $name <p>Название QR кода</p> json $json <p>Параметры компании</p> integer $id <p>id QR</p>
    * @return boolean <p>Результат выполнения метода</p>
    */
    public static function updateQrById($name, $json, $id) 
    {
        $result = DB::update('UPDATE `qr_tbl` SET `name` = ?, `param` = ?, updated_at = NOW() WHERE `id` = ?', [$name, $json, $id]);
        return $result;
    } 
    
    /**
    * Удаляем QR
    * @param integer $id <p>id QR</p>
    * @return boolean <p>Результат выполнения метода</p>
    */
    public static function deleteQrById($id) 
    {
         $result = DB::delete('DELETE FROM `qr_tbl` WHERE `id` = ?', [$id]);
         return $result;
    }
    
    /**
    * Выводим QR по идентификатору
    * @param integer $id <p>id QR</p>
    * @return array <p>Массив с данными запрашиваемого QR</p>
    */
    public static function getQrById($id) 
    {
        $result = DB::select('SELECT * FROM `qr_tbl` WHERE `id` = ?', [$id]);
        return $result;
    }
    
    /**
    * Выводим название QR по идентификатору
    * @param integer $id <p>id QR</p>
    * @return array <p>Название QR</p>
    */
    public static function getQrNameById($id) 
     {
         $result = DB::select('SELECT `name` FROM `qr_tbl` WHERE `id` = ?', [$id]);
         return $result;
     }
    
    /**
    * Выводим параметры QR по идентификатору
    * @param integer $id <p>id QR</p>
    * @return array <p>Параметры QR</p>
    */
     public static function getQrParamById($id) 
     {
         $result = DB::select('SELECT `param` FROM `qr_tbl` WHERE `id` = ?', [$id]);
         return $result;
     }
    
    /**
    * Увеличиваем счетчик переходов по QR
    * @param integer $id <p>id QR</p>
    * @return boolean <p>Результат выполнения метода</p>
    */
     public static function countUp($id) 
    {
        $result = DB::update('UPDATE `qr_tbl` SET `count` = `count` + 1 WHERE `id` = ?', [$id]);
         return $result;
    }
    
}
