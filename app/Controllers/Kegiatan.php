<?php
namespace App\Controllers;
use App\Models\KegiatanModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Kegiatan extends BaseController
{
 private function modelKegiatan(): KegiatanModel
 {
   return new KegiatanModel();
 }

 private function inputKegiatan(): array
 {
  return [ 
        'judul'    => trim((string) $this->request->getPost('judul')), 
        'kategori' => trim((string) $this->request->getPost('kategori')), 
        'kuota'    => trim((string) $this->request->getPost('kuota')), 
    ];
 }

 private function aturanValidasi(): array
 {
 return [
   'judul'    => 'required|min_length[5]|max_length[150]', 
   'kategori' => 'required|min_length[3]|max_length[80]', 
   'kuota'    => 'required|is_natural|less_than_equal_to[1000]', 
 ];
 }

 // Tambahkan method baru di dalam class Kegiatan. 
private function pesanValidasi(): array 
{ 
    return [ 
        'judul' => [ 
            'required'   => 'Judul kegiatan wajib diisi.', 
            'min_length' => 'Judul minimal 5 karakter.', 
            'max_length' => 'Judul maksimal 150 karakter.', 
        ], 
        'kategori' => [ 
            'required'   => 'Kategori wajib diisi.', 
            'min_length' => 'Kategori minimal 3 karakter.', 
            'max_length' => 'Kategori maksimal 80 karakter.', 
        ], 
        'kuota' => [    'required'           => 'Kuota wajib diisi.', 
            'is_natural'         => 'Kuota harus bilangan bulat >= 0.', 
            'less_than_equal_to' => 'Kuota maksimal 1000.', 
        ], 
    ]; 
}  

 private function pastikanAda(int $id): array
 {
   $item = $this->modelKegiatan()->cari($id);
   if ($item === null) 
   {
      throw PageNotFoundException::forPageNotFound('Kegiatan tidak ditemukan.');
   }
   return $item;
 }

 public function index()
 {
   helper('url');
   return view('kegiatan/index', [
   'kegiatan' => $this->modelKegiatan()->semua(),
   ]);
 }

 public function detail(int $id)
 {
   helper('url');
   return view('kegiatan/detail', ['item' => $this->pastikanAda($id)]);
 }

 public function statistik()
 {
   helper('url');
   return view('kegiatan/statistik', [
   'ringkasan' => $this->modelKegiatan()->ringkasanKategori(),
   ]);
 }

 public function tambah()
   {
      helper(['url', 'form']);
      return view('kegiatan/form', 
      [
      'mode' => 'tambah',
      'action' => site_url('kegiatan/simpan'),
      'item' => [],
      ]);
   }

 public function simpan()
   {
         $data = $this->inputKegiatan(); 
   
      if (! $this->validateData( 
         $data, $this->aturanValidasi(), $this->pesanValidasi() 
      )) { 
         return redirect()->back()->withInput() 
   ->with('errors', $this->validator->getErrors()); 
      } 
   
      $this->modelKegiatan()->insert($data); 
      return redirect()->to(site_url('kegiatan')) 
         ->with('success', 'Kegiatan berhasil ditambahkan.'); 
   }

 public function edit(int $id)
 {
   helper(['url', 'form']);
   return view('kegiatan/form', 
   [
   'mode' => 'edit',
   'action' => site_url('kegiatan/' . $id . '/update'),
   'item' => $this->pastikanAda($id),
   ]);
 }

 public function perbarui(int $id)
 {
 $this->pastikanAda($id); // 404 jika ID tidak ada. 
    $data = $this->inputKegiatan(); 
 
    if (! $this->validateData( 
        $data, $this->aturanValidasi(), $this->pesanValidasi() 
    )) { 
        return redirect()->back()->withInput() 
            ->with('errors', $this->validator->getErrors()); 
    } 
 
    $this->modelKegiatan()->update($id, $data); 
    return redirect()->to(site_url('kegiatan')) 
        ->with('success', 'Kegiatan berhasil diubah.'); 
 }

 public function hapus(int $id)
 {
   $this->pastikanAda($id);
   $this->modelKegiatan()->delete($id);
   return redirect()->to(site_url('kegiatan'))
   ->with('success', 'Kegiatan berhasil dihapus.');
 }

 public function cari()
{
      helper('url');
      $keyword = trim((string) $this->request->getGet('q'));

      $kegiatan = ($keyword !== '') 
         ? $this->modelKegiatan()->cariKeyword($keyword) 
         : [];

      return view('kegiatan/cari', [
         'kegiatan' => $kegiatan,
         'keyword'  => $keyword,
      ]);
   }

}
