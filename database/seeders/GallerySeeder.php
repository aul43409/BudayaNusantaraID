<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $galleries = [
            // Pakaian Adat
            [
                'title' => 'Ulos Batak',
                'description' => 'Kain tenun tradisional masyarakat Batak yang memiliki makna spiritual dan sosial dalam berbagai upacara adat.',
                'detailed_description' => 'Ulos adalah kain tenun tradisional masyarakat Batak Sumatera Utara yang memiliki makna spiritual dan sosial yang sangat mendalam. Setiap motif dan warna pada Ulos memiliki filosofi dan fungsi khusus dalam berbagai upacara adat seperti pernikahan, kelahiran, dan kematian. Ulos tidak hanya berfungsi sebagai pakaian, tetapi juga sebagai simbol berkah, kehangatan, dan kasih sayang dalam budaya Batak.',
                'image_url' => 'https://infokost.id/blog/wp-content/uploads/2023/10/Nama-Pakaian-Adat-Sumatera-Utara.webp',
                'region' => 'Sumatera Utara',
                'category' => 'pakaian_adat',
                'is_featured' => false,
                'tags' => ['tenun', 'batak', 'spiritual', 'upacara adat'],
                'views' => rand(100, 1000)
            ],
            [
                'title' => 'Kebaya Jawa',
                'description' => 'Pakaian tradisional wanita Jawa yang mencerminkan keanggunan dan kesederhanaan dalam filosofi hidup masyarakat Jawa.',
                'detailed_description' => 'Kebaya merupakan pakaian tradisional wanita Jawa yang telah ada sejak abad ke-15. Kebaya mencerminkan nilai-nilai keanggunan, kesederhanaan, dan kehalusan budi yang menjadi ciri khas filosofi hidup masyarakat Jawa. Desain kebaya yang tidak berlebihan namun tetap memesona menggambarkan konsep "andhap asor" atau rendah hati dalam budaya Jawa.',
                'image_url' => 'https://assets.promediateknologi.id/crop/0x0:0x0/750x500/webp/photo/2023/08/04/Snapinstaapp_334849439_1981022142234940_6665247490311761773_n_1080-3630450252.jpg',
                'region' => 'Jawa',
                'category' => 'pakaian_adat',
                'is_featured' => false,
                'tags' => ['kebaya', 'jawa', 'keanggunan', 'tradisional'],
                'views' => rand(100, 1000)
            ],
            [
                'title' => 'Payas Agung',
                'description' => 'Busana adat pernikahan Bali dengan perhiasan mendetail yang mencerminkan keindahan dan kemewahan budaya Bali.',
                'detailed_description' => 'Payas Agung adalah busana adat pernikahan Bali yang sangat mewah dan penuh dengan detail perhiasan emas. Setiap elemen dalam Payas Agung memiliki makna filosofis yang berkaitan dengan ajaran Hindu dan kepercayaan masyarakat Bali. Busana ini mencerminkan keindahan, kemewahan, dan spiritualitas yang tinggi dalam budaya Bali.',
                'image_url' => 'https://i.pinimg.com/736x/f0/58/c6/f058c67c6945403d7798e17ea78026c8.jpg',
                'region' => 'Bali',
                'category' => 'pakaian_adat',
                'is_featured' => false,
                'tags' => ['pernikahan', 'bali', 'hindu', 'mewah'],
                'views' => rand(100, 1000)
            ],
            [
                'title' => 'Baju Bodo',
                'description' => 'Pakaian adat wanita Bugis-Makassar dengan warna-warna cerah yang melambangkan stratifikasi sosial pemakainya.',
                'detailed_description' => 'Baju Bodo adalah pakaian tradisional wanita Bugis-Makassar yang memiliki ciri khas berupa lengan pendek dan warna-warna cerah. Warna pada Baju Bodo tidak hanya untuk keindahan, tetapi juga melambangkan stratifikasi sosial pemakainya dalam masyarakat Bugis-Makassar. Setiap warna memiliki makna dan tingkatan sosial yang berbeda.',
                'image_url' => 'https://serayunews.pw/wp-content/uploads/2024/08/baju-bodo.jpeg',
                'region' => 'Sulawesi Selatan',
                'category' => 'pakaian_adat',
                'is_featured' => false,
                'tags' => ['bugis', 'makassar', 'stratifikasi sosial', 'warna'],
                'views' => rand(100, 1000)
            ],

            // Rumah Adat
            [
                'title' => 'Tongkonan',
                'description' => 'Rumah adat Toraja dengan atap melengkung seperti perahu yang menjadi pusat kehidupan sosial dan ritual masyarakat Toraja.',
                'detailed_description' => 'Tongkonan adalah rumah adat masyarakat Toraja yang memiliki bentuk atap melengkung menyerupai perahu. Filosofi Tongkonan dibangun berdasarkan konsep tiga lapisan dunia: dunia atas (langit), dunia tengah (bumi), dan dunia bawah. Tongkonan bukan hanya tempat tinggal, tetapi juga menjadi pusat kehidupan sosial, ritual, dan identitas masyarakat Toraja.',
                'image_url' => 'https://www.ruparupa.com/blog/wp-content/uploads/2022/02/toraja-houses-1500.jpg',
                'region' => 'Sulawesi Selatan',
                'category' => 'rumah_adat',
                'is_featured' => true,
                'tags' => ['toraja', 'perahu', 'tiga dunia', 'ritual'],
                'views' => rand(500, 2000)
            ],
            [
                'title' => 'Rumah Gadang',
                'description' => 'Rumah adat Minangkabau dengan atap bergonjong menyerupai tanduk kerbau.',
                'detailed_description' => 'Rumah Gadang adalah rumah adat masyarakat Minangkabau dengan ciri khas atap bergonjong yang menyerupai tanduk kerbau. Struktur rumah ini mencerminkan sistem matrilineal masyarakat Minang, di mana garis keturunan dihitung dari pihak ibu. Kamar-kamar dalam Rumah Gadang disusun berdasarkan hierarki perempuan dalam keluarga.',
                'image_url' => 'https://awsimages.detik.net.id/community/media/visual/2023/08/09/rumah-adat-sumatera-barat_169.jpeg?w=1200',
                'region' => 'Sumatera Barat',
                'category' => 'rumah_adat',
                'is_featured' => false,
                'tags' => ['minangkabau', 'tanduk kerbau', 'matrilineal', 'gonjong'],
                'views' => rand(100, 1000)
            ],
            [
                'title' => 'Rumah Betang',
                'description' => 'Rumah panjang tradisional suku Dayak yang dapat menampung hingga 150 orang.',
                'detailed_description' => 'Rumah Betang adalah rumah tradisional suku Dayak yang berbentuk panjang dan dapat menampung hingga 150 orang dalam satu bangunan. Rumah ini dibangun tinggi di atas tiang untuk menghindari banjir dan serangan musuh. Rumah Betang mencerminkan nilai-nilai kebersamaan, gotong royong, dan kehidupan komunal yang kuat dalam masyarakat Dayak.',
                'image_url' => 'https://cdn2.gnfi.net/gnfi/uploads/articles/rumah-betang-2-34f72cc687b5321f675abebe64ab962b.jpg',
                'region' => 'Kalimantan',
                'category' => 'rumah_adat',
                'is_featured' => false,
                'tags' => ['dayak', 'rumah panjang', 'komunal', 'gotong royong'],
                'views' => rand(100, 1000)
            ],
            [
                'title' => 'Honai',
                'description' => 'Rumah tradisional suku Dani di Papua yang berbentuk bundar dengan atap kerucut.',
                'detailed_description' => 'Honai adalah rumah tradisional suku Dani di Papua yang memiliki bentuk bundar dengan atap kerucut. Honai dirancang khusus untuk menyimpan panas di malam hari karena daerah pegunungan Papua yang dingin. Terdapat pembagian Honai berdasarkan gender dan fungsi sosial, mencerminkan sistem sosial yang terorganisir dalam masyarakat Dani.',
                'image_url' => 'https://www.ruparupa.com/blog/wp-content/uploads/2022/02/rumah-adat-papua-e1645175880542.jpg',
                'region' => 'Papua',
                'category' => 'rumah_adat',
                'is_featured' => false,
                'tags' => ['dani', 'papua', 'pegunungan', 'kerucut'],
                'views' => rand(100, 1000)
            ],

            // Tarian
            [
                'title' => 'Tari Kecak',
                'description' => 'Tarian yang menampilkan puluhan penari pria yang duduk melingkar dan menyerukan "cak" secara berirama.',
                'detailed_description' => 'Tari Kecak adalah tarian tradisional Bali yang unik karena menggabungkan seni tari dan musik vokal. Puluhan penari pria duduk melingkar dan menyerukan "cak" secara berirama sambil menceritakan epos Ramayana. Tarian ini tidak menggunakan alat musik tradisional, melainkan mengandalkan suara manusia sebagai pengiring musik.',
                'image_url' => 'https://geti.id/wp-content/uploads/2023/08/image-1024x695.png',
                'region' => 'Bali',
                'category' => 'tarian',
                'is_featured' => true,
                'tags' => ['kecak', 'ramayana', 'musik vokal', 'melingkar'],
                'views' => rand(500, 2000)
            ],
            [
                'title' => 'Tari Saman',
                'description' => 'Dikenal juga sebagai "tari seribu tangan" karena gerakan tangan yang cepat dan serentak.',
                'detailed_description' => 'Tari Saman adalah tarian tradisional Aceh yang dikenal sebagai "tari seribu tangan" karena gerakan tangan yang sangat cepat dan serentak. Tarian ini menggabungkan tepukan dada, tepukan tangan, dan nyanyian yang berisi pesan moral dan religius. Tari Saman telah diakui UNESCO sebagai Warisan Budaya Takbenda yang Memerlukan Perlindungan Mendesak.',
                'image_url' => 'https://awsimages.detik.net.id/community/media/visual/2023/10/22/peringatan-hari-santri-nasional-di-depok_169.jpeg?w=1200',
                'region' => 'Aceh',
                'category' => 'tarian',
                'is_featured' => false,
                'tags' => ['saman', 'seribu tangan', 'unesco', 'moral religius'],
                'views' => rand(100, 1000)
            ],
            [
                'title' => 'Tari Bedhaya',
                'description' => 'Tarian sakral Jawa yang dibawakan oleh sembilan penari wanita, melambangkan sembilan lubang dalam tubuh manusia.',
                'detailed_description' => 'Tari Bedhaya adalah tarian sakral dari Keraton Jawa yang dibawakan oleh sembilan penari wanita. Jumlah sembilan melambangkan sembilan lubang dalam tubuh manusia menurut filosofi Jawa. Gerakan tari yang halus dan anggun mencerminkan falsafah keseimbangan hidup dan spiritualitas tinggi dalam budaya Jawa.',
                'image_url' => 'https://cdn1-production-images-kly.akamaized.net/vB_3aarb4JivtKdNAy4pLEdqmE0=/1200x675/smart/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/2078933/original/042938000_1523531464-jumenengan-2.jpg',
                'region' => 'Jawa Tengah',
                'category' => 'tarian',
                'is_featured' => false,
                'tags' => ['bedhaya', 'sakral', 'keraton', 'spiritualitas'],
                'views' => rand(100, 1000)
            ]
        ];

        foreach ($galleries as $gallery) {
            Gallery::create($gallery);
        }
    }
}