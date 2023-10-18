<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class AdminController extends Controller
{
    public function AdminPage()
    {
        $products = Product::all();
        return view('pages/laravel-examples/user-management',[
            'products' => $products,
        ]);
    }
    public function Edit($id){
        $product = Product::find($id);
        return view('EditPage',[
            'product' => $product,
        ]);
    }
    public function EditProduct(Request $request, $id){
        // Проверка, было ли загружено новое изображение
        if ($request->hasFile('image')) {
            // Если файл изображения загружен, тогда проводим валидацию
            $request->validate([
                'title' => 'required|max:255',
                'price' => 'required|numeric|min:0',
                'description' => 'required',
                'grade' => 'required|in:1,2,3,4,5',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Проверка на изображение
            ]);
        } else {
            // Если файл изображения не загружен, просто проводим валидацию для остальных полей
            $request->validate([
                'title' => 'required|max:255',
                'price' => 'required|numeric|min:0',
                'description' => 'required',
                'grade' => 'required|in:1,2,3,4,5',
            ]);
        }
    
        // Находим товар
        $product = Product::findOrFail($id);
    
        // Обновляем данные товара
        $product->title = $request->input('title');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->grade = $request->input('grade');
    
        // Обрабатываем изображение, если оно было загружено
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName(); // Создаем уникальное имя
            $file = $request->file('image');
            $product->image = $imageName; // Обновляем путь к изображению
            $file->move(public_path('images'), $imageName);
        }
    
        // Сохраняем изменения
        $product->save();
    
        return redirect('/admin')->with('success', 'Товар успешно обновлен');
    }
    
    public function AddPage(){
        return view('AddPage');
    }
    public function addProduct(Request $request){
    // Валидация данных
    $validator = Validator::make($request->all(), [
        'title' => 'required|max:255',
        'price' => 'required|numeric|min:0',
        'description' => 'required',
        'grade' => 'required|in:1,2,3,4,5',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Проверка на изображение
    ]);

    if ($validator->fails()) {
        return redirect('/admin/add')
                    ->withErrors($validator)
                    ->withInput();
    }

    // Обработка изображения

    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->storeAs('public/images', $request->file('image')->getClientOriginalName());
        $file = $request->file('image');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('images'), $fileName);
    }

    // Создание нового товара
    Product::create([
        'title' => $request->input('title'),
        'price' => $request->input('price'),
        'description' => $request->input('description'),
        'grade' => $request->input('grade'),
        'image' => $fileName,
    ]);

    return redirect('/admin')->with('success', 'Товар успешно добавлен');
}

}

