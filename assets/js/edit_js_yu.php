<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<!--   Core JS Files   -->
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
<script src="../assets/js/plugins/chartjs.min.js"></script>

<!--   dashboard js   -->
<script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
        type: "bar",
        data: {
            labels: ["M", "T", "W", "T", "F", "S", "S"],
            datasets: [{
                label: "Sales",
                tension: 0.4,
                borderWidth: 0,
                borderRadius: 4,
                borderSkipped: false,
                backgroundColor: "rgba(255, 255, 255, .8)",
                data: [50, 20, 10, 22, 50, 10, 40],
                maxBarThickness: 6
            }, ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                }
            },
            interaction: {
                intersect: false,
                mode: 'index',
            },
            scales: {
                y: {
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5],
                        color: 'rgba(255, 255, 255, .2)'
                    },
                    ticks: {
                        suggestedMin: 0,
                        suggestedMax: 500,
                        beginAtZero: true,
                        padding: 10,
                        font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: 'normal',
                            lineHeight: 2
                        },
                        color: "#fff"
                    },
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5],
                        color: 'rgba(255, 255, 255, .2)'
                    },
                    ticks: {
                        display: true,
                        color: '#f8f9fa',
                        padding: 10,
                        font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
            },
        },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    new Chart(ctx2, {
        type: "line",
        data: {
            labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                label: "Mobile apps",
                tension: 0,
                borderWidth: 0,
                pointRadius: 5,
                pointBackgroundColor: "rgba(255, 255, 255, .8)",
                pointBorderColor: "transparent",
                borderColor: "rgba(255, 255, 255, .8)",
                borderColor: "rgba(255, 255, 255, .8)",
                borderWidth: 4,
                backgroundColor: "transparent",
                fill: true,
                data: [50, 40, 300, 320, 500, 350, 200, 230, 500],
                maxBarThickness: 6

            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                }
            },
            interaction: {
                intersect: false,
                mode: 'index',
            },
            scales: {
                y: {
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5],
                        color: 'rgba(255, 255, 255, .2)'
                    },
                    ticks: {
                        display: true,
                        color: '#f8f9fa',
                        padding: 10,
                        font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        color: '#f8f9fa',
                        padding: 10,
                        font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
            },
        },
    });

    var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

    new Chart(ctx3, {
        type: "line",
        data: {
            labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                label: "Mobile apps",
                tension: 0,
                borderWidth: 0,
                pointRadius: 5,
                pointBackgroundColor: "rgba(255, 255, 255, .8)",
                pointBorderColor: "transparent",
                borderColor: "rgba(255, 255, 255, .8)",
                borderWidth: 4,
                backgroundColor: "transparent",
                fill: true,
                data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                maxBarThickness: 6

            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                }
            },
            interaction: {
                intersect: false,
                mode: 'index',
            },
            scales: {
                y: {
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5],
                        color: 'rgba(255, 255, 255, .2)'
                    },
                    ticks: {
                        display: true,
                        padding: 10,
                        color: '#f8f9fa',
                        font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        color: '#f8f9fa',
                        padding: 10,
                        font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
            },
        },
    });
</script>

<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>

<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/material-dashboard.min.js?v=3.0.0"></script>

<!-- My JS -->
<script>
    window.onload = function() {

        const setClass = document.querySelectorAll("#setClass");
        const setOther = document.getElementById("setOther");
        const setColor = document.getElementById("setColor");
        const setSize = document.getElementById("setSize");
        const setBrand = document.getElementById("setBrand");

        // 取得 select 元素
        let selectClass = document.getElementById("setClass");
        // 將 PHP 變數的值嵌入到 JavaScript 中
        let row = <?php echo json_encode($row); ?>;


        const input = document.getElementById('inputGroupFile01');
        const preview = document.getElementById('imagePreview');
        const uploadedImage = document.getElementById('uploadedImage');






        // 如果商品有上傳圖片，設定預設圖片
        if (row['image_url']) {
            uploadedImage.src = "../assets/img/product_img/" + row["image_url"];
        }


        // 監聽檔案選擇事件，更新預覽圖片
        input.addEventListener('change', previewImage);

        function previewImage() {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    uploadedImage.src = e.target.result;
                };

                reader.readAsDataURL(input.files[0]);
            }
        }






        for (let i = 0; i < setClass.length; i++) {
            setClass[i].addEventListener("change", function() {
                let className = this.value;
                // console.log(className);
                // return;

                setOther.innerHTML = '';
                setColor.innerHTML = '';
                setSize.innerHTML = '';
                setBrand.innerHTML = '';


                $.ajax({
                        method: "POST", //or GET
                        url: "../pages/info-api.php",
                        dataType: "json",
                        data: {
                            className: className
                        }
                    })
                    .done(function(response) {
                        // console.log(response)
                        let status = response.status;
                        if (status == 0) {
                            alert(response.message);
                            return;
                        }

                        let info = response.info;
                        // console.log(info);


                        let listOther = String(info.other).split(',');

                        listOther.forEach(function(otherValue) {
                            let other = document.createElement("option");
                            other.value = otherValue;
                            other.text = otherValue;
                            setOther.add(other);
                        });


                        for (let i = 0; i < setOther.options.length; i++) {
                            if (setOther.options[i].value === row['other']) {
                                setOther.options[i].selected = true;
                                // console.log(setOther);
                                break;
                            }
                        }



                        let listColor = String(info.color).split(',');
                        // console.log(setColor);

                        listColor.forEach(function(colorValue) {
                            let color = document.createElement("option");
                            color.value = colorValue;
                            color.text = colorValue;

                            // 檢查該選項是否在原本的值中，若是則設定為被選擇
                            if (row['color'].includes(colorValue)) {
                                color.selected = true;
                            }

                            setColor.add(color);

                        });



                        let listSize = String(info.size).split(',');
                        // console.log(listSize);

                        listSize.forEach(function(sizeValue) {
                            let size = document.createElement("option");
                            size.value = sizeValue;
                            size.text = sizeValue;

                            // 檢查該選項是否在原本的值中，若是則設定為被選擇
                            if (row['size'].includes(sizeValue)) {
                                size.selected = true;
                            }


                            setSize.add(size);
                        });



                        let listBrand = String(info.brand).split(',');

                        listBrand.forEach(function(brandValue) {
                            let brand = document.createElement("option");
                            brand.value = brandValue;
                            brand.text = brandValue;
                            setBrand.add(brand);
                        });

                        for (let i = 0; i < setBrand.options.length; i++) {
                            if (setBrand.options[i].value === row['brand']) {
                                setBrand.options[i].selected = true;
                                break;
                            }
                        }



                    }).fail(function(jqXHR, textStatus) {
                        console.log("Request failed: " + textStatus);
                    });

            })
        }



        for (let i = 0; i < selectClass.options.length; i++) {
            if (selectClass.options[i].value === row['class']) {
                selectClass.options[i].selected = true;
                break;
            }
        }



        // 創建一個事件
        let event = new Event("change");

        // 觸發 onchange 事件
        selectClass.dispatchEvent(event);

    }
</script>