<?php

use App\Models\Alat;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('halaman index alat dapat diakses dan menampilkan data', function () {
    Alat::create([
        'nama_alat' => 'USG Doppler 4D',
        'tahun' => 2023,
        'merek' => 'GE Healthcare',
        'lokasi' => 'Radiologi',
    ]);

    $response = $this->get(route('alat.index'));

    $response->assertStatus(200);
    $response->assertSee('USG Doppler 4D');
    $response->assertSee('GE Healthcare');
    $response->assertSee('Radiologi');
    $response->assertSee('Tambah Alat');
});

test('halaman create alat dapat diakses', function () {
    $response = $this->get(route('alat.create'));

    $response->assertStatus(200);
    $response->assertSee('Tambah Alat Medis');
    $response->assertSee('nama_alat');
    $response->assertSee('merek');
    $response->assertSee('tahun');
    $response->assertSee('lokasi');
});

test('validasi form store memerlukan semua field yang ditentukan', function () {
    $response = $this->post(route('alat.store'), []);

    $response->assertSessionHasErrors(['nama_alat', 'tahun', 'merek', 'lokasi']);
});

test('berhasil menyimpan alat baru dan redirect ke index', function () {
    $payload = [
        'nama_alat' => 'Defibrillator Biphasic',
        'tahun' => 2024,
        'merek' => 'Mindray',
        'lokasi' => 'IGD',
    ];

    $response = $this->post(route('alat.store'), $payload);

    $response->assertRedirect(route('alat.index'));
    $response->assertSessionHas('success');

    $this->assertDatabaseHas('alats', [
        'nama_alat' => 'Defibrillator Biphasic',
        'merek' => 'Mindray',
        'lokasi' => 'IGD',
    ]);
});

test('halaman edit alat dapat diakses', function () {
    $alat = Alat::create([
        'nama_alat' => 'EKG 12 Channel',
        'tahun' => 2022,
        'merek' => 'Philips',
        'lokasi' => 'Poli Jantung',
    ]);

    $response = $this->get(route('alat.edit', $alat->id));

    $response->assertStatus(200);
    $response->assertSee('EKG 12 Channel');
    $response->assertSee('Philips');
});

test('berhasil memperbarui data alat', function () {
    $alat = Alat::create([
        'nama_alat' => 'Infusion Pump',
        'tahun' => 2021,
        'merek' => 'Terumo',
        'lokasi' => 'ICU',
    ]);

    $response = $this->put(route('alat.update', $alat->id), [
        'nama_alat' => 'Infusion Pump Pro',
        'tahun' => 2022,
        'merek' => 'Terumo Corp',
        'lokasi' => 'ICCU',
    ]);

    $response->assertRedirect(route('alat.index'));
    $response->assertSessionHas('success');

    $this->assertDatabaseHas('alats', [
        'id' => $alat->id,
        'nama_alat' => 'Infusion Pump Pro',
        'lokasi' => 'ICCU',
    ]);
});

test('berhasil menghapus data alat', function () {
    $alat = Alat::create([
        'nama_alat' => 'Suction Pump',
        'tahun' => 2020,
        'merek' => 'Thomas',
        'lokasi' => 'Bedah',
    ]);

    $response = $this->delete(route('alat.destroy', $alat->id));

    $response->assertRedirect(route('alat.index'));
    $response->assertSessionHas('success');

    $this->assertDatabaseMissing('alats', [
        'id' => $alat->id,
    ]);
});
