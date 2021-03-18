var app = angular.module('app', [],['$httpProvider', function ($httpProvider) {
    $httpProvider.defaults.headers.post['X-CSRF-TOKEN'] = $('meta[name=csrf-token]').attr('content')
}]);

// app.controller('controller', function ($scope) {    
app.controller('controller',  ['$scope', '$http', function ($scope, $http) {    
    $scope.input = [
        {
            email : '',
            nama : '',
            telp : '',
            tanggal_lahir : '',
            jenis_kelamin : '',
            alamat : '',
            pelatih : '',
            alasan : '',
            foto : '',
            bukti : '',
            riwayat : []            
        },
        {
            email : '',
            nama : '',
            telp : '',
            tanggal_lahir : '',
            jenis_kelamin : '',
            alamat : '',
            pelatih : '',
            alasan : '',
            foto : '',
            bukti : '',
            riwayat : []
        },
        {
            email : '',
            nama : '',
            telp : '',
            tanggal_lahir : '',
            jenis_kelamin : '',
            alamat : '',
            pelatih : '',
            alasan : '',
            foto : '',
            bukti : '',
            riwayat : []
        },
    ]
    
    $scope.riwayat = [        
        [
            {
                id: 'jantung',
                label: 'Jantung',
                isChecked: false
            },
            {
                id: 'paru',
                label: 'Paru',
                isChecked: false
            },
            {
                id: 'tulang',
                label: 'Tulang',
                isChecked: false
            },
            {
                id: 'lemak',
                label: 'Lemak',
                isChecked: false
            },
            {
                id: 'otot',
                label: 'Otot',
                isChecked: false
            },
            {
                id: 'syaraf',
                label: 'Syaraf',
                isChecked: false
            },
            {
                id: 'lainnya',
                label: 'Jika ada yang lainnya sebutkan di kolom alasan belajar renang',
                isChecked: false
            },
        ],
        [
            {
                id: 'jantung',
                label: 'Jantung',
                isChecked: false
            },
            {
                id: 'paru',
                label: 'Paru',
                isChecked: false
            },
            {
                id: 'tulang',
                label: 'Tulang',
                isChecked: false
            },
            {
                id: 'lemak',
                label: 'Lemak',
                isChecked: false
            },
            {
                id: 'otot',
                label: 'Otot',
                isChecked: false
            },
            {
                id: 'syaraf',
                label: 'Syaraf',
                isChecked: false
            },
            {
                id: 'lainnya',
                label: 'Jika ada yang lainnya sebutkan di kolom alasan belajar renang',
                isChecked: false
            },
        ],
        [
            {
                id: 'jantung',
                label: 'Jantung',
                isChecked: false
            },
            {
                id: 'paru',
                label: 'Paru',
                isChecked: false
            },
            {
                id: 'tulang',
                label: 'Tulang',
                isChecked: false
            },
            {
                id: 'lemak',
                label: 'Lemak',
                isChecked: false
            },
            {
                id: 'otot',
                label: 'Otot',
                isChecked: false
            },
            {
                id: 'syaraf',
                label: 'Syaraf',
                isChecked: false
            },
            {
                id: 'lainnya',
                label: 'Jika ada yang lainnya sebutkan di kolom alasan belajar renang',
                isChecked: false
            },
        ]        
    ]

    $scope.paket = []
    $scope.selectedRiwayat = []
    $scope.selectedRiwayatLabel = []
    
    $scope.onFileSelected = ($files, $row) => {        
        angular.forEach($files, function (value, key) {
            $scope.input[$row].foto = value
        })
    }

    $scope.onBuktiSelected = ($files, $row) => {        
        angular.forEach($files, function (value, key) {
            $scope.input[$row].bukti = value
        })
    }
    
    $scope.changeSelection = () => {
        $scope.fetchSelectedRiwayat()
        $scope.getSelectedRiwayatLabel()
    }

    $scope.fetchSelectedRiwayat = () => {
        for (let index = 0; index < $scope.riwayat.length; index++) {
            $scope.selectedRiwayat[index] = $scope.riwayat[index].filter((value, i) => {
                return value.isChecked
            })   
        }        
    }

    $scope.getSelectedRiwayatLabel = () => {    
        for (let index = 0; index < $scope.jumlahorang.length; index++) {            
            $scope.selectedRiwayatLabel[index] = $scope.selectedRiwayat[index].map((value) => {
                return value.label
            })   
        }    
    }
    
    $scope.processForm = () => {                
        $scope.fetchSelectedRiwayat()
        for (let index = 0; index < $scope.jumlahorang.length; index++) {
            $scope.input[index].riwayat = $scope.selectedRiwayat[index]
        }
        // console.log($scope.input)

        // send data post
        var formData = new FormData()
        for (let i = 0; i < $scope.jumlahorang.length; i++) {
            formData.append('email[]', $scope.input[i].email)
            formData.append('nama[]', $scope.input[i].nama)
            formData.append('telp[]', $scope.input[i].telp)
            formData.append('tanggal_lahir[]', $scope.input[i].tanggal_lahir)
            formData.append('jenis_kelamin[]', $scope.input[i].jenis_kelamin)
            formData.append('pelatih[]', $scope.input[i].pelatih)
            formData.append('alasan[]', $scope.input[i].alasan)
            formData.append('alamat[]', $scope.input[i].alamat)
            formData.append('foto[]', $scope.input[i].foto)
            formData.append('bukti[]', $scope.input[i].bukti)
            formData.append('riwayat[]', $scope.input[i].riwayat)
        }

        // console.log (formData)
        for (var pair of formData.entries()) {
            console.log(pair[0]+ ', ' + pair[1]); 
        }        

        // var request = {
        //     method: 'POST',
        //     url: '/pendaftaran',
        //     data: formData,
        //     headers: {
        //         'Content-Type': 'Application/json',                
        //     },
        //     transformResponse: [
        //         function (data) {
        //             return data
        //         }
        //     ]
        // }        

        // $http(request)
        //     .then(function (response) {
        //         console.log(response)
        //         alert("Terima kasih telah mendaftar")
        //     }, function (error) {
        //         console.error(error)
        //     })        
        
    }

    $scope.firstName = "John";
    $scope.form = []
    $scope.programs = [
        {
            nama: "1. Kelas Privat",
            desc: "<br><span class='text-danger highlight'>*</span>Tiket kolam bayar sendiri di Loket / Kasir.<br><span class='text-danger highlight'>*</span>Setiap Pertemuan 1 jam Pembelajaran.<br><span class='text-danger highlight'>*</span>Kolam Renang Tirto Kencono, Kolam Renang Katak Riang, Kolam Renang Millenium.<br><span class='text-danger highlight'>*</span>Jadwal bisa menyesuaikan dengan Pelatih.",
            icon: "mdi mdi-cube-outline",
            value: "Kelas Privat"
        },
        {
            nama: "2. Paket Privat",
            desc: "<br><span class='text-danger highlight'>*</span>Tiket kolam bayar sendiri di Loket / Kasir.<br><span class='text-danger highlight'>*</span>Setiap Pertemuan 1 jam Pembelajaran.<br><span class='text-danger highlight'>*</span>Kolam Renang Tirto Kencono, Kolam Renang Katak Riang, Kolam Renang Millenium.<br><span class='text-danger highlight'>*</span>Jadwal bisa menyesuaikan dengan Pelatih.",
            icon: "mdi mdi-wallet-giftcard",
            value: "Paket Privat"
        },
        {
            nama: "3. Kelas Anak Berkebutuhan Khusus/Terapi",
            desc: "<br><span class='text-danger highlight'>*</span>Untuk murid baru wajib membayar Biaya Pendaftaran (50k).<br><span class='text-danger highlight'>*</span>Sudah Termasuk Tiket Kolam.<br><span class='text-danger highlight'>*</span>Setiap Pertemuan 1,5 jam Pembelajaran.<br><span class='text-danger highlight'>*</span>Kolam Renang Tirto Kencono, Kolam Renang Katak Riang, Kolam Renang Millenium.<br><span class='text-danger highlight'>*</span>Jadwal bisa menyesuaikan dengan Pelatih.",
            icon: "fas fa-child",
            value: "Kelas Anak Berkebutuhan Khusus/Terapi"
        },
        {
            nama: "4. Kelas Pemula",
            desc: "<br><span class='text-danger highlight'>*</span>Untuk murid baru wajib membayar Biaya Pendaftaran (50k).<br><span class='text-danger highlight'>*</span>Sudah Termasuk Tiket Kolam.<br><span class='text-danger highlight'>*</span>Setiap Pertemuan 1,5 jam Pembelajaran.<br><span class='text-danger highlight'>*</span>Kolam Renang Tirto Kencono dan Kolam Renang Katak Riang.<br><span class='text-danger highlight'>*</span>Jadwal Setiap Hari Senin dan Sabtu Pukul 06.00-09.00 AM.",
            icon: "fas fa-baby",
            value: "Kelas Pemula"
        },
        {
            nama: "5. Kelas Prestasi/Selam",
            desc: "<br><span class='text-danger highlight'>*</span>Wajib Bisa 4 gaya.<br><span class='text-danger highlight'>*</span>Untuk murid baru wajib membayar Biaya Pendaftaran (50k).<br><span class='text-danger highlight'>*</span>Sudah Termasuk Tiket Kolam.<br><span class='text-danger highlight'>*</span>Setiap Pertemuan 1,5 jam Pembelajaran.<br><span class='text-danger highlight'>*</span>Kolam Renang Tirto Kencono dan Kolam Renang Katak Riang.<br><span class='text-danger highlight'>*</span>Jadwal Akan disampaikan setelah mendaftar.",
            icon: "mdi mdi-trophy",
            value: "Kelas Prestasi/Selam"
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
        $scope.paket.program = $scope.programs[$scope.form.paket].value;
    }
    $scope.gantiOrang = () => {
        $scope.isForm = true
        let array = []
        for(let i = 0 ; i<$scope.form.orang ; i++){
            array.push(i)
        }
        $scope.jumlahorang = array
        console.log($scope.jumlahorang)
        $scope.paket.jumlah = $scope.jumlah[$scope.form.paket][$scope.form.orang-1].nama
    }
}]).filter('trustHtml', function ($sce) {
    return function (html) {
        return $sce.trustAsHtml(html)
    }
});

app.directive('ngFiles', ['$parse', function ($parse) {
    function file_links(scope, element, attrs) {
        var onChange = $parse(attrs.ngFiles);
        element.on('change', function (event) {
            onChange(scope, {$files: event.target.files})
        })
    }

    return {
        link: file_links
    }
}])