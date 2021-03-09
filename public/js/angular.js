var app = angular.module('app', []);
app.controller('controller', function ($scope) {
    $scope.firstName = "John";
    $scope.form = {}
    $scope.programs = [
        {
            nama: "1. Kelas Privat",
            desc: "<br><span class='text-danger highlight'>*</span>Tiket kolam bayar sendiri di Loket / Kasir.<br><span class='text-danger highlight'>*</span>Setiap Pertemuan 1 jam Pembelajaran.<br><span class='text-danger highlight'>*</span>Kolam Renang Tirto Kencono, Kolam Renang Katak Riang, Kolam Renang Millenium.<br><span class='text-danger highlight'>*</span>Jadwal bisa menyesuaikan dengan Pelatih.",
            icon: "mdi mdi-cube-outline"
        },
        {
            nama: "2. Paket Privat",
            desc: "<br><span class='text-danger highlight'>*</span>Tiket kolam bayar sendiri di Loket / Kasir.<br><span class='text-danger highlight'>*</span>Setiap Pertemuan 1 jam Pembelajaran.<br><span class='text-danger highlight'>*</span>Kolam Renang Tirto Kencono, Kolam Renang Katak Riang, Kolam Renang Millenium.<br><span class='text-danger highlight'>*</span>Jadwal bisa menyesuaikan dengan Pelatih.",
            icon: "mdi mdi-wallet-giftcard"
        },
        {
            nama: "3. Kelas Anak Berkebutuhan Khusus/Terapi",
            desc: "<br><span class='text-danger highlight'>*</span>Untuk murid baru wajib membayar Biaya Pendaftaran (50k).<br><span class='text-danger highlight'>*</span>Sudah Termasuk Tiket Kolam.<br><span class='text-danger highlight'>*</span>Setiap Pertemuan 1,5 jam Pembelajaran.<br><span class='text-danger highlight'>*</span>Kolam Renang Tirto Kencono, Kolam Renang Katak Riang, Kolam Renang Millenium.<br><span class='text-danger highlight'>*</span>Jadwal bisa menyesuaikan dengan Pelatih.",
            icon: "fas fa-child"
        },
        {
            nama: "4. Kelas Pemula",
            desc: "<br><span class='text-danger highlight'>*</span>Untuk murid baru wajib membayar Biaya Pendaftaran (50k).<br><span class='text-danger highlight'>*</span>Sudah Termasuk Tiket Kolam.<br><span class='text-danger highlight'>*</span>Setiap Pertemuan 1,5 jam Pembelajaran.<br><span class='text-danger highlight'>*</span>Kolam Renang Tirto Kencono dan Kolam Renang Katak Riang.<br><span class='text-danger highlight'>*</span>Jadwal Setiap Hari Senin dan Sabtu Pukul 06.00-09.00 AM.",
            icon: "fas fa-baby"
        },
        {
            nama: "5. Kelas Prestasi/Selam",
            desc: "<br><span class='text-danger highlight'>*</span>Wajib Bisa 4 gaya.<br><span class='text-danger highlight'>*</span>Untuk murid baru wajib membayar Biaya Pendaftaran (50k).<br><span class='text-danger highlight'>*</span>Sudah Termasuk Tiket Kolam.<br><span class='text-danger highlight'>*</span>Setiap Pertemuan 1,5 jam Pembelajaran.<br><span class='text-danger highlight'>*</span>Kolam Renang Tirto Kencono dan Kolam Renang Katak Riang.<br><span class='text-danger highlight'>*</span>Jadwal Akan disampaikan setelah mendaftar.",
            icon: "mdi mdi-trophy"
        }
    ]
    $scope.jumlah = [
        [
            {
                nama: "1 Orang - Rp 75K",
                desc: "",
                jumlah: 1
            },
            {
                nama: "2 Orang - Rp 140K",
                desc: "",
                jumlah: 2
            },
            {
                nama: "3 Orang - Rp 200K",
                desc: "",
                jumlah: 3
            }
        ],
        [
            {
                nama: "1 Orang - Rp 750K",
                desc: "<br><span class='text-danger highlight'>*</span>11x pertemuan.",
                jumlah: 1
            },
            {
                nama: "2 Orang - Rp 1.200K",
                desc: "<br><span class='text-danger highlight'>*</span>10x pertemuan.",
                jumlah: 2
            },
            {
                nama: "3 Orang - Rp 1.800K",
                desc: "<br><span class='text-danger highlight'>*</span>10x pertemuan.",
                jumlah: 3
            }
        ],
        [
            {
                nama: "1 Orang - Rp 200K + Rp 50K (BP)",
                desc: "<br><span class='text-danger highlight'>*</span>4x pertemuan.<br><span class='text-danger highlight'>*</span>Biaya dibayar setiap bulan.<br><span class='text-danger highlight'>*</span>Biaya Pendaftaran (BP) hanya dibayar sekali.",
                jumlah: 1
            }
        ],
        [
            {
                nama: "1 Orang - Rp 150K + Rp 50K (BP)",
                desc: "<br><span class='text-danger highlight'>*</span>4x pertemuan.<br><span class='text-danger highlight'>*</span>Biaya dibayar setiap bulan.<br><span class='text-danger highlight'>*</span>Biaya Pendaftaran (BP) hanya dibayar sekali.",
                jumlah: 1
            }
        ],
        [
            {
                nama: "1 Orang - Rp 130K + Rp 50K (BP)",
                desc: "<br><span class='text-danger highlight'>*</span>4x pertemuan.<br><span class='text-danger highlight'>*</span>Biaya dibayar setiap bulan.<br><span class='text-danger highlight'>*</span>Biaya Pendaftaran (BP) hanya dibayar sekali.",
                jumlah: 1
            }
        ]
    ]
    $scope.gantiProgram = () => {
        $scope.isForm = false
        $scope.form.orang = $scope.jumlah[$scope.form.paket]
    }
    $scope.gantiOrang = () => {
        $scope.isForm = true
        let array = []
        for(let i = 0 ; i<$scope.form.orang ; i++){
            array.push(i)
        }
        $scope.jumlahorang = array
        console.log($scope.jumlahorang)
    }
}).filter('trustHtml', function ($sce) {
    return function (html) {
        return $sce.trustAsHtml(html)
    }
});