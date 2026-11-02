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
 'judul' => trim((string) $this->request->getPost('judul')),
 'kategori' => trim((string) $this->request->getPost('kategori')),
 'kuota' => trim((string) $this->request->getPost('kuota')),
 ];
 }
 private function aturanValidasi(): array
 {
 return [
 'judul' => 'required|min_length[3]|max_length[150]',
 'kategori' => 'required|in_list[Seminar,Workshop,Lomba,Organisasi]',
 'kuota' => 'required|is_natural',
 ];
 }
 private function pastikanAda(int $id): array
 {
 $item = $this->modelKegiatan()->cari($id);
 if ($item === null) {
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
 return view('kegiatan/form', [
 'mode' => 'tambah',
 'action' => site_url('kegiatan/simpan'),
 'item' => [],
    ]);
    }
    public function simpan()
 {
 $data = $this->inputKegiatan();
 if (! $this->validateData($data, $this->aturanValidasi())) {
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
 return view('kegiatan/form', [
 'mode' => 'edit',
 'action' => site_url('kegiatan/' . $id . '/update'),
 'item' => $this->pastikanAda($id),
 ]);
 }
 public function perbarui(int $id)
 {
 $this->pastikanAda($id);
 $data = $this->inputKegiatan();
 if (! $this->validateData($data, $this->aturanValidasi())) {
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
