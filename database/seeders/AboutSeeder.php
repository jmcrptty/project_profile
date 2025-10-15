<?php
// ============================================
// FILE: database/seeders/AboutSeeder.php
// ============================================

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\About;
use Illuminate\Support\Facades\DB;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::beginTransaction();

        try {
            $this->command->info('🚀 Starting About Seeder...');

            // ========================================
            // 1. Seed Background
            // ========================================
            $this->command->info('📝 Seeding Background...');
            
            About::updateOrCreate(
                ['type' => 'background'],
                [
                    'content' => 'Pertanian modern menghadapi tantangan besar: efisiensi, keberlanjutan, dan produktivitas. Dengan memanfaatkan teknologi Internet of Things (IoT), proyek ini bertujuan untuk memantau kondisi lingkungan pertanian secara real-time menggunakan sensor pintar yang terintegrasi dengan sistem monitoring berbasis cloud.'
                ]
            );

            $this->command->info('✅ Background seeded!');

            // ========================================
            // 2. Seed Goals
            // ========================================
            $this->command->info('🎯 Seeding Goals...');
            
            About::updateOrCreate(
                ['type' => 'goal'],
                [
                    'content' => "Meningkatkan hasil panen dengan data berbasis sensor\nMengurangi pemborosan air melalui irigasi otomatis\nMonitoring real-time melalui dashboard berbasis web\nMendukung pertanian berkelanjutan dan ramah lingkungan"
                ]
            );

            $this->command->info('✅ Goals seeded!');

            // ========================================
            // 3. Seed Tim Dosen
            // ========================================
            $this->command->info('👨‍🏫 Seeding Tim Dosen...');
            
            $dosens = [
                [
                    'type' => 'dosen',
                    'name' => 'Dr. Andi Saputra, S.T., M.Kom',
                    'position' => 'Dosen Pembimbing Utama',
                    'order' => 1
                ],
                [
                    'type' => 'dosen',
                    'name' => 'Prof. Maria Yuliana, Ph.D',
                    'position' => 'Ahli IoT & Embedded Systems',
                    'order' => 2
                ],
                [
                    'type' => 'dosen',
                    'name' => 'Ir. Budi Pranoto, M.T',
                    'position' => 'Spesialis Hardware IoT',
                    'order' => 3
                ],
                [
                    'type' => 'dosen',
                    'name' => 'Dr. Siti Hartini, M.Sc',
                    'position' => 'Spesialis Data Analytics',
                    'order' => 4
                ]
            ];

            foreach ($dosens as $dosen) {
                About::updateOrCreate(
                    ['type' => 'dosen', 'name' => $dosen['name']],
                    $dosen
                );
            }

            $this->command->info('✅ ' . count($dosens) . ' Tim Dosen seeded!');

            // ========================================
            // 4. Seed Tim Mahasiswa
            // ========================================
            $this->command->info('👨‍🎓 Seeding Tim Mahasiswa...');
            
            $mahasiswas = [
                [
                    'type' => 'mahasiswa',
                    'name' => 'Rudi Dermawan',
                    'role' => 'Full Stack Developer',
                    'order' => 1
                ],
                [
                    'type' => 'mahasiswa',
                    'name' => 'Sari Ayu Lestari',
                    'role' => 'IoT Hardware Engineer',
                    'order' => 2
                ],
                [
                    'type' => 'mahasiswa',
                    'name' => 'Ahmad Maulana',
                    'role' => 'Data Analyst',
                    'order' => 3
                ],
                [
                    'type' => 'mahasiswa',
                    'name' => 'Dewi Puspita',
                    'role' => 'UI/UX Designer',
                    'order' => 4
                ]
            ];

            foreach ($mahasiswas as $mahasiswa) {
                About::updateOrCreate(
                    ['type' => 'mahasiswa', 'name' => $mahasiswa['name']],
                    $mahasiswa
                );
            }

            $this->command->info('✅ ' . count($mahasiswas) . ' Tim Mahasiswa seeded!');

            // ========================================
            // 5. Seed Mitra
            // ========================================
            $this->command->info('🤝 Seeding Mitra...');
            
            About::updateOrCreate(
                ['type' => 'mitra'],
                [
                    'name' => 'PT. AgriTech Nusantara',
                    'mitra_type' => 'Mitra Utama',
                    'description' => 'Perusahaan teknologi pertanian terkemuka yang mendukung inovasi dan pengembangan solusi IoT untuk pertanian modern di Indonesia.'
                ]
            );

            $this->command->info('✅ Mitra seeded!');

            DB::commit();

            $this->command->info('');
            $this->command->info('🎉 ========================================');
            $this->command->info('✅ About data seeded successfully!');
            $this->command->info('🎉 ========================================');
            $this->command->newLine();

        } catch (\Exception $e) {
            DB::rollBack();
            
            $this->command->error('❌ Error seeding About data:');
            $this->command->error($e->getMessage());
            
            throw $e;
        }
    }
}