<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Imports\ProductImport;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Validation\Rules\Password;

class AdminController extends Controller
{
    public function petugasPage(){
        $petugas = User::where('usertype', 'petugas')->get();
        // $petugas = User::all();
        return view('admin.petugas', [
            'petugas' => $petugas,
        ]);
    }

    public function inpetugas(){
        return view('admin.tambah.tambah-petugas');
    }

    public function addpetugas(Request $request){
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'username' => ['required', 'max:255'],
            'alamat' => ['required'],
            // 'usertype' => ['required'],
            'nomor_hp' => ['required', 'max:15'],
            'status' => ['required', 'max:11'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'alamat' => $request->alamat,
            'usertype' => 'petugas',
            'nomor_hp' => $request->nomor_hp,
            'status' => $request->status,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.petugas.index');
    }

    public function detailpetugas($id){
        $petugas = User::find($id);
        return view('admin.detail.detail-user', [
            'petugas' => $petugas,
        ]);
    }

    public function deletepetugas($id){
        $petugas = User::find($id);
        $petugas->delete();
        return redirect()->route('admin.petugas.index');
    }

    public function petugastrash(){
        $petugastrash = User::onlyTrashed()->get();
        return view ('admin.trash.petugas-trash', [
            'petugastrash' => $petugastrash,
        ]);
    }

    public function restorepetugas($id){
        $petugas = User::onlyTrashed()->where('id', $id)->first();
        $petugas->restore();
        return redirect()->route('admin.petugas.trash');
    }

    public function editpetugas($id){    
        $petugas = User::find($id);
        return view('admin.edit.edit-petugas', [
            'petugas' => $petugas,
        ]);
    }

    public function updatepetugas(Request $request, $id)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'username' => ['required', 'max:255'],
            'alamat' => ['required'],
            'nomor_hp' => ['required', 'max:15'],
            'status' => ['required', 'max:11'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique('users')->ignore($id), // Abaikan validasi unique untuk ID ini
            ],
            'password' => ['nullable', 'confirmed', Password::defaults()],
        ]);

        $petugas = User::findOrFail($id);
        $petugas->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'alamat' => $request->alamat,
            'usertype' => 'petugas',
            'nomor_hp' => $request->nomor_hp,
            'status' => $request->status,
            'email' => $request->email,
        ]);

        // Perbarui password jika diisi
        if ($request->password) {
            $petugas->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect()->route('admin.petugas.index')->with('success', 'Data petugas berhasil diperbarui!');
    }

    

    //bagian controller produk
    public function produkPage(){
        $produk = Product::all();
        return view('admin.produk', [
            'produk' => $produk,
        ]);
    }

    public function detailproduk($id){
        $produk = Product::find($id);
        return view('admin.detail.detail-produk', [
            'produk' => $produk,
        ]);
    }

    public function tambahproduk(Request $request){
        return view('admin.tambah.tambah-produk');
    }

    public function storeproduk(Request $request){
        $request->validate([
            'nama_produk' => ['required', 'string', 'max:255'],
            'harga_beli' => ['required'],
            'harga_jual' => ['required'],
            'stok' => ['required'],
            'barcode' => ['required'],
            'id_category' => ['required'],
        ]);

        $rawHargaBeli = str_replace(['Rp', '.', ' '], '', $request->harga_beli);
        $rawHargaJual = str_replace(['Rp', '.', ' '], '', $request->harga_jual);

        $hargaBeli = number_format((float) $rawHargaBeli, 2, '.', '');
        $hargaJual = number_format((float) $rawHargaJual, 2, '.', '');


        $produk = Product::create([
            'nama_produk' => $request->nama_produk,
            'harga_beli' => $hargaBeli,
            'harga_jual' => $hargaJual,
            'stok' => $request->stok,
            'barcode' => $request->barcode,
            'id_category' => $request->id_category,
        ]); 

        return redirect()->route('admin.produk.index');
    }

    public function deleteproduk($id){
        $produk = Product::find($id);
        $produk->delete();
        return redirect()->route('admin.produk.index');
    }

    public function produktrash(){
        $produktrash = Product::onlyTrashed()->get();
        return view ('admin.trash.produk-trash', [
            'produktrash' => $produktrash,
        ]);
    }
    
    public function restoreproduk($id){
        $produk = Product::onlyTrashed()->where('id', $id)->first();
        $produk->restore();
        return redirect()->route('admin.produk.trash');
    }
    
    public function editproduk($id){
        $produk = Product::find($id);
        return view('admin.edit.edit-produk', [
            'produk' => $produk,
        ]);
    }

    public function updateproduk(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => ['required', 'string', 'max:255'],
            'harga_beli' => ['required'],
            'harga_jual' => ['required'],
            'stok' => ['required'],
            'barcode' => ['required'],
        ]);

        // Mengolah harga_beli dan harga_jual seperti di storeproduk
        $rawHargaBeli = str_replace(['Rp', '.', ' '], '', $request->harga_beli);
        $rawHargaJual = str_replace(['Rp', '.', ' '], '', $request->harga_jual);

        $hargaBeli = number_format((float) $rawHargaBeli, 2, '.', '');
        $hargaJual = number_format((float) $rawHargaJual, 2, '.', '');

        $produk = Product::findOrFail($id);
        $produk->update([
            'nama_produk' => $request->nama_produk,
            'harga_beli' => $hargaBeli,
            'harga_jual' => $hargaJual,
            'stok' => $request->stok,
            'barcode' => $request->barcode,
        ]);

        return redirect()->route('admin.produk.index')->with('success', 'Data produk berhasil diperbarui!');
    }

    public function importProduk(Request $request){
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        // Proses impor file
        Excel::import(new ProductImport, $request->file('file'));

        return redirect()->route('admin.produk.index')->with('success', 'Data produk berhasil diimpor!');
    }

    public function templateProduk(){
        $filePath = public_path('templates/template-produk.xlsx');
        
        // Pastikan file ada
        if (file_exists($filePath)) {
            return response()->download($filePath);
        }

        $spreadsheet = IOFactory::load($filePath);
        $sheet = $spreadsheet->getActiveSheet();

        $dataKategori = Category::get(['id', 'nama_kategori']);
        $startRowKategori = 2;

        foreach ($dataKategori as $index => $data) {
            $sheet->setCellValue('H' . ($startRowKategori + $index), $data->id);
            $sheet->setCellValue('I' . ($startRowKategori + $index), $data->nama_kategori);
        }

        $tempPath = storage_path('app/public/template/template-produk.xlsx');
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save($tempPath);

        $fileName = 'template-produk.xlsx';
        $headers = [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ];

        // Return the file as a download response
        return response()->download($tempPath, $fileName, $headers)->deleteFileAfterSend(true);
    }
   
    
    //bagian controller kategori
    public function kategoriPage(){
        $kategori = Category::all();
        return view('admin.kategori', [
            'kategori' => $kategori,
        ]);
    }

    public function tambahkategori(Request $request){
        return view('admin.tambah.tambah-kategori');
    }

    public function storekategori(Request $request){
        $request->validate([
            'nama_kategori' => ['required', 'string', 'max:255'],
        ]);

        $kategori = Category::create([
            'nama_kategori' => $request->nama_kategori,
        ]); 

        return redirect()->route('admin.kategori.index');
    }

    public function deletekategori($id){
        $kategori = Category::find($id);
        $kategori->delete();
        return redirect()->route('admin.kategori.index');
    }

    public function kategoritrash(){
        $kategoritrash = Category::onlyTrashed()->get();
        return view ('admin.trash.kategori-trash', [
            'kategoritrash' => $kategoritrash,
        ]);
    }
    
    public function restorekategori($id){
        $kategori = Category::onlyTrashed()->where('id', $id)->first();
        $kategori->restore();
        return redirect()->route('admin.kategori.trash');
    }

    public function editkategori($id){
        $kategori = Category::find($id);
        return view('admin.edit.edit-kategori', [
            'kategori' => $kategori,
        ]);
    }

    public function updatekategori(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => ['required', 'string', 'max:255'],
        ]);

        $kategori = Category::findOrFail($id);
        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->route('admin.kategori.index')->with('success', 'Data kategori berhasil diperbarui!');
    }
}
