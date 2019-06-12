<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Qr;
use Endroid\QrCode\QrCode;
use Image;

class IndexController extends Controller
{
    
    /**
    * Выводим список QR кодов
    */
    public function actionIndex() 
    {
        //получаем все qr-коды
        $qrList = Qr::all();
        
        return view('site.index')->with('qrList', $qrList);
    }
    
    /**
    * Создаем новый QR код
    */
    public function actionAdd(Request $request) 
    {
        
        if($request->isMethod('post')) {
            
            //валидация
            $rules = [
                'qrName' => 'required|unique:qr_tbl,name',
                'city' => 'required',
                'campaing' => 'required',
                'source' => 'required|active_url',
                'product' => 'required'
            ];
            
            $this->validate($request, $rules);
            
            $qrName = $request->input('qrName');
            $city = $request->input('city');
            $campaing = $request->input('campaing');
            $source = $request->input('source');
            $product = $request->input('product');
            
            //формируем параменты в массив
            $param = [
                'city' => $city,
                'campaing' => $campaing,
                'source' => $source,
                'product' => $product
            ];
            
            //преобразуем в JSON-формат
            $json = json_encode($param);
            
            //добавляем в БД
            $result = Qr::createQr($qrName, $json);
            
            //возвращаемся на главную страницу
            if($result) return redirect('/');
              
        } else {
            // если метод GET - выводим форму
            return view('site.add');
        }
        
    }
    
    /**
    * Генерируем QR
    * @param integer $id <p>id QR</p>
    * @return view
    */
    public function actionGenerate($id) 
    {
        
        //получаем имя по идентификатору
        $name = Qr::getQrNameById($id);

        foreach($name as $key => $val) {
             foreach ($val as $v => $k) {
               $name = $k;      
             }
        }

        //формируем промежуточную ссылку сбора статистики
        $src = "http://" . $_SERVER['SERVER_NAME'] . "/statistics/" . $id;

        //формируем местоположение файла .PNG
        $file = $_SERVER['DOCUMENT_ROOT'] . "/img/qrcodes/" . $name . ".png";

        // создаем QR код
        $qrCode = new QrCode($src);

        //создаем файл
        $qrCode->writeFile($file);

        //конвертируем в JPG и сохраняем файл
        $jpg = Image::make($file)->encode('jpg');
        $jpg->save($_SERVER['DOCUMENT_ROOT'] . "/img/qrcodes/" . $name . ".jpg");
        
        //если файл создан - предлагаем скачать файл
        if (file_exists($file)) 
        {
            return redirect('/download/' . $name);
        }
            
        //иначе возвращаемся на главную страницу
        return redirect('/');
        
    }
    
    /**
    * Редактируем QR код
    * @param integer $id <p>id QR</p>
    * @return view
    */
    public function actionUpdate(Request $request, $id) 
    {
        
        if($request->isMethod('post')) {
            
            //валидация
            $rules = [
                'qrName' => 'required',
                'city' => 'required',
                'campaing' => 'required',
                'source' => 'required|active_url',
                'product' => 'required'
            ];
            
            $this->validate($request, $rules);
            
            $qrId = $request->input('id');
            $qrName = $request->input('qrName');
            $city = $request->input('city');
            $campaing = $request->input('campaing');
            $source = $request->input('source');
            $product = $request->input('product');
            
            //формируем параметры в массив
            $param = [
                'city' => $city,
                'campaing' => $campaing,
                'source' => $source,
                'product' => $product
            ];
            
            //преобразуем в JSON
            $json = json_encode($param);
            
            //редактируем запись
            $result = Qr::updateQrById($qrName, $json, $qrId);

            //удаляем файл
            if($result) 
//            {
//                $file = $_SERVER['DOCUMENT_ROOT'] . "/img/qrcodes/" . $qrName . ".png";
//                unset($file);
//                $file = $_SERVER['DOCUMENT_ROOT'] . "/img/qrcodes/" . $qrName . ".jpg";
//                unset($file);
//            }
            
            //возвращаемся на главную страницу
            return redirect('/');
            
        } else 
        {
            //если метод GET
            //запрашиваем qr по идентификатору
            $qr = Qr::getQrById($id);
            
            $name = $qr[0]->name;
            $param = json_decode($qr[0]->param);
                        
            //выводим и заполняем форму
            return view('site.update', ['id' => $id, 'name' => $name, 'param'=>$param]);
        }
        
    }
    
    /**
    * Удаляем QR
    * @param integer $id <p>id QR</p>
    * @return view
    */
    public function actionDelete($id) 
    {
        //получаем имя qr кода по идентификатору
        $name = Qr::getQrNameById($id);
        $name = $name[0]->name;
        
        //удаляем qr код
        $result = Qr::deleteQrById($id);
        
        //удаляем файл
//        if($result) 
//        {
//            $file = $_SERVER['DOCUMENT_ROOT'] . "/img/qrcodes/" . $qrName . ".png";
//            unset($file);
//            $file = $_SERVER['DOCUMENT_ROOT'] . "/img/qrcodes/" . $qrName . ".jpg";
//            unset($file);
//        }
            
         return redirect('/');
    }
    
    /**
    * Скачиваем QR код
    * @param string $name <p>Название QR кода</p>
    */
    public function actionDownload(Request $request, $name = false) 
    {
        
        if($request->isMethod('post')) {
                        
            $formatFile = $request->input('formatFile');
            $fileName = $request->input('fileName');

            //формируем адрес файла для скачивания
            $file = $_SERVER['DOCUMENT_ROOT'] . "/img/qrcodes/" . $fileName . "." . $formatFile;

            //если файл существует - скачиваем
            if (file_exists($file)) {
                   return response()->download($file);
            }
        } else
        {
        //если GET
            if ($name) 
            {
                //выводим форму
                return view('site.download', ['fileName'=>$name]);    
            } else {
                //иначе возвращаемся на главную страницу
                return redirect('/');
            }
            
        }
            
    }
    
    /**
    * Увеличиваем кол-во переходов QR
    * @param integer $id <p>id QR</p>
    */
    public function actionStatistics($id) 
    {
        //получаем параметры по идентификатору
        $param = Qr::getQrParamById($id);
        
        foreach($param as $key => $val) {
             foreach ($val as $v => $k) {
               $param = $k;      
             }
        }
        
        $param = json_decode($param);
        
        foreach($param as $key => $val) {
            if ($key == "source") {
                $source = $val;
                break;
            }
        }
        
        //увеличиваем посещение на 1
        $result = Qr::countUp($id);
        
        //перенаправляем на ресурс
        return redirect($source);
    }
}
