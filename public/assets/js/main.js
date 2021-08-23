
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    function show_image() {
        if (this.files && this.files[0]) {
            var obj = new FileReader();
            obj.onload = function (data) {
                var image = document.getElementById('image');
                image.src = data.target.result;
                image.style.display = "block";
            }
            obj.readAsDataURL(this.files[0]);
        }

    }
    function change1(url) {

        var categorie = $('#cat').val();
        //{{url('admin/ajax_get_cycle_by_categorie')}}
        $.ajax({
            url: url,
            type:"POST",
            data:{categorie:categorie},
            success:function(data){
                 $('#cycle').html(data.success);
                                }
        })
    
    }

    function change_script(id, name, value, url) {
        $.ajax({
            url: url,
            type:"POST",
            data:{id:id,name:name,value:value},
            success:function(data){

                                }
        }) 
    }

    function change_block(id, url) { 

        //{{url('admin/ajax_update_block_user')}}
        $.ajax({
            url: url,
            type:"POST",
            data:{id:id},
            success:function(data){
                                }
        })

    }


    function change2(url) {
        var cycle = $('#cycle').val();
        //{{url('admin/ajax_get_class_by_cycle')}}
        $.ajax({
            url: url,
            type:"POST",
            data:{cycle:cycle},
            success:function(data){
                $('#class').html(data.success);
                                }
        })
    }
    function change11(url) {
        var categorie = $('#cat1').val();
        //{{url('admin/ajax_get_cycle_by_categorie')}}
        $.ajax({
            url: url,
            type:"POST",
            data:{categorie:categorie},
            success:function(data){
                 $('#cycle1').html(data.success);
                                }
        })
    }
    function change111(url, id) {
        var categorie = $('#cat1'+id).val();
        //{{url('admin/ajax_get_cycle_by_categorie')}}
        $.ajax({
            url: url,
            type:"POST",
            data:{categorie:categorie},
            success:function(data){
                 $('#cycle1'+id).html(data.success);
                                }
        })
    }
    function change22(url) {
        var cycle = $('#cycle1').val();
        //{{url('admin/ajax_get_class_by_cycle')}}
        $.ajax({
            url: url,
            type:"POST",
            data:{cycle:cycle},
            success:function(data){
                $('#class1').html(data.success);
                                }
        })
    }
    function change3(url) {

        var trans = $('#transport').val();
        //{{url('admin/ajax_get_trajet_by_transport')}}
        $.ajax({
            url: url,
            type:"POST",
            data:{trans:trans},
            success:function(data){
                $('#trajet').html(data.success);
                                }
        })
    }
    function changet3(url) {
        var classe = $('#class').val();
        window.location.href = url + '/' + classe;
    }
    function change4(url) {
        var categorie = $('#cat').val();
        //{{url('admin/ajax_get_matiere_by_categorie')}}
        $.ajax({
            url: url,
            type:"POST",
            data:{categorie:categorie},
            success:function(data){
                 $('#matiere').html(data.success);
                                }
        })
    }
    function change33(url) {

        var trans = $('#transport1').val();
        //{{url('admin/ajax_get_trajet_by_transport')}}
        $.ajax({
            url: url,
            type:"POST",
            data:{trans:trans},
            success:function(data){
                $('#trajet1').html(data.success);
                                }
        })
    }
    function change44(url) {
        var categorie = $('#cat1').val();
        //{{url('admin/ajax_get_matiere_by_categorie')}}
        $.ajax({
            url: url,
            type:"POST",
            data:{categorie:categorie},
            success:function(data){
                 $('#matiere1').html(data.success);
                                }
        })
    }
    function change5(url) {
        var classe = $('#class').val();
        //{{url('admin/ajax_get_student_by_class')}}
        $.ajax({
            url: url,
            type:"POST",
            data:{classe:classe},
            success:function(data){
                 $('#eleve').html(data.success);
                                }
        })
    }
    function change51(url) {
        var classe = $('#class').val();
        //{{url('admin/ajax_get_student_by_class1')}}
        $.ajax({
            url: url,
            type:"POST",
            data:{classe:classe},
            success:function(data){
                 $('#tags').html(data.success);
                                }
        })
    }
    function change6(url,student) {
        var classe = $('#class').val();
        //{{url('admin/ajax_get_student_by_class_friends')}}
        $.ajax({
            url: url,
            type:"POST",
            data:{classe:classe,student:student},
            success:function(data){
                $('#eleve').html(data.success);
                                }
        })
    }
    function change7(url) {
        var categorie = $('#cat').val();
        //{{url('admin/ajax_get_class_by_categorie')}}
        $.ajax({
            url: url,
            type:"POST",
            data:{categorie:categorie},
            success:function(data){
                $('#class').html(data.success);
                                }
        })
    }

    function change8(url) {
        let exam = document.getElementById('exam');
        let classe = document.getElementById('class');
        //{{url('prof/ajax_get_class_by_exam')}}
        $.ajax({
            url: url,
            type:"POST",
            data:{exam:exam.value},
            success:function(data){
                classe.innerHTML = data.success;
                                }
        })
    }
    
    function change9(url) {
        let exam = document.getElementById('exam');
        let classe = document.getElementById('class');
        let table = document.getElementById('tableBody');
        //{{url('prof/ajax_get_student_by_exam')}}
        $.ajax({
            url: url,
            type:"POST",
            data:{exam:exam.value,classe:classe.value},
            success:function(data){
                table.innerHTML = data.success;
                                }
        })
    }

    function change10(url, id, exam) {

        let note = document.getElementById('input'+id).value;
        // {{url('prof/ajax_get_add_student_note')}}
        $.ajax({
            url: url,
            type:"POST",
            data:{id:id, exam:exam, note:note},
            success:function(data){
                                }
        })
    }

    function statistique(url) {
        var date1 = $('#date1').val();
        var date2 = $('#date2').val();
        //{{url('admin/ajax_get_class_by_categorie')}}
        $.ajax({
            url: url,
            type:"POST",
            data:{date1:date1,date2:date2},
            success:function(data){
                $('#salaire').html(data.salaire +' DH');
                $('#pay').html(data.pay +' DH');
                $('#charge').html(data.charge +' DH');
                                }
        })
    }

    function ajax_get_student_by_phone(url) {
        var phone = $('#phone').val();
        //{{url('admin/ajax_get_student_by_phone')}}
        $.ajax({
            url: url,
            type:"POST",
            data:{phone:phone},
            success:function(data){
                 $('#table').html(data.success);
                                }
        })
    }

    function ajax_get_student_by_cin(url) {
        var cin = $('#cin').val();
        //{{url('admin/ajax_get_student_by_cin')}}
        $.ajax({
            url: url,
            type:"POST",
            data:{cin:cin},
            success:function(data){
                 $('#table').html(data.success);
                                }
        })
    }

    function ajax_get_student_by_massar(url) {
        var massar = $('#massar').val();
        //{{url('admin/ajax_get_student_by_massar')}}
        $.ajax({
            url: url,
            type:"POST",
            data:{massar:massar},
            success:function(data){
                 $('#table').html(data.success);
                                }
        })
    }

    function ajax_get_student_by_massar1(url) {
        var massar = $('#massar').val();
        //{{url('admin/ajax_get_student_by_massar1')}}
        $.ajax({
            url: url,
            type:"POST",
            data:{massar:massar},
            success:function(data){
                if (data.count == 'non') {
                    $("#hide").css("display", "");
        
                } else {
                    $("#hide").css("display", "none");
                }
                 $('#card').html(data.success);
                                }
        })
    }

    function Paiements(url) {
        var mois = $('#mois').val();
        //{{url('admin/ajax_get_Paiements')}}
        $.ajax({
            url: url,
            type:"POST",
            data:{mois:mois},
            success:function(data){
                $('#payé').html(data.payé+' DH');
                $('#total').html(data.total+' DH');
                                }
        })
    }

    function absence(id, ok, heure, heure1,url, jour, classe) {

        let desc = document.querySelector('#desc'+id);

        let mouafak = {
                        heure:heure,
                        heure1:heure1,
                        jour:jour,
                        classe:classe,
                        id:id,
                        ok:ok,
                        desc:desc.value,
                    };

        //{{url('admin/ajax_get_student_by_phone')}}

        $.ajax({
            url: url,
            type:"POST",
            data:mouafak,
            success:function(data){
                                }
        })
    }

    function get_grh(url) {
        var fonction = $('#fonction').val();
        //{{url('admin/ajax_get_grh_by_fonction')}}
        $.ajax({
            url: url,
            type:"POST",
            data:{fonction:fonction},
            success:function(data){
                $('#staff').html(data.success);
                                }
        })
    }

    function autre(){
        var type = $('#type').val();
        if (type == 'Autre') {
            $("#type1").css("display", "");

        } else {
            $("#type1").css("display", "none");
        }
    }

    function autre1(){

        var test = document.getElementById('test');
        var type = document.getElementById('type');
        var test1 = document.getElementById('test1');
        if (type.value == 'Autre') {
            test.name = 'type';
            test1.style.display = 'block';
        } else {
            test.name = 'autre';
            test1.style.display = 'none';
        }
        
    }

    function payement_prix(value) {
        var prix = document.getElementById('prix');
        var mois = document.getElementById('mois');
        if (value == 'rien') {
            prix.style.display = 'none';
            mois.style.display = 'none';
        } else if(value == 'mois') {
            prix.style.display = 'block';
            mois.style.display = 'none';
        }else if(value == 'anné') {
            prix.style.display = 'block';
            mois.style.display = 'none';
        }else if(value == 'Autre') {
            prix.style.display = 'block';
            mois.style.display = 'block';
        }
    }

    function dbclick_prix(mois, prix, id, count) {
        var input = document.getElementById('input'+id);
        input.outerHTML = '<td id="input'+ id +'" ondblclick="dbclick_prix('+mois+','+prix+', '+id+', '+count+')"><input type="number" onchange="update_prix('+id+')" onfocusout="outside(' + id + ', ' + count + ','+prix+')" name="' + mois +'" value="'+ prix +'" id="'+ id +'" class="form-control"></td>';
    }

    function update_prix(id, prix) {
        var url = document.getElementById('url').value;
        var mois = document.getElementById('mois').value;
        var value = document.getElementById(id).value;
        var student = document.getElementById('student').value;
        if (value > 0) {
            $.ajax({
                url: url,
                type:"POST",
                data:{mois:mois,value:value,student:student},
                success:function(data){
                    document.getElementById('shide').style.display = 'none';
                                    }
            })
        }
    }
    function outside(id, count, prix) {
        var td = document.getElementById('input'+id);
        var input = document.getElementById(id);
        var input1 = input.value;
        if (input.value < 1) {
            input1 = prix;
        }
        for (let index = id; index < id+count; index++) {
            var td1 = document.getElementById('input'+index);
            td1.innerHTML = input.value + ' DH';
        }
        td.outerHTML = '<td id="input'+id+'" ondblclick="dbclick_prix('+input.name+','+input1+', '+id+','+count+')">'+input1 + ' DH</td>'; 
    }

    function supprime(id) {
        document.getElementById('logout-form' + id).submit();
    }

    function supprime1(id) {
        swal({
            title: "vous-êtes sûre?",
            icon: "warning",
            buttons: {
                cancel: {
                text: "Annuler",
                value: null,
                visible: true,
                className: "",
                closeModal: true,
                },
                confirm: {
                text: "Supprimer",
                value: true,
                visible: true,
                className: "",
                closeModal: true
                }
            },
            dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            document.getElementById('logout-form1' + id).submit();
        } else {
            swal("les informations sont bien protégé");
        }
        });
    }
    function supprime2(id) {
        document.getElementById('logout-form2' + id).submit();
        }
function supprime3(id) {
    document.getElementById('logout-form3' + id).submit();
    }

    function prof_salaire(id, salaire) {
        var salam = $('#test'+id).val();
        var ok = salam*salaire;
        if (salam > 0) {
            $("#hide"+id).css("display", "");

        } else {
            $("#hide"+id).css("display", "none");
        }
        $('#ok'+id).html(ok+' DH');
    }

    function salaire1(id, url, mois, url1, salaire, id1) {

        if (id1 != 'rien') {
            var salam = $('#test'+id).val();
            var salaire1 = salaire*salam;
        } else {
                var salaire1 = salaire;
        }
            swal({
                title: "vous-êtes sûre?",
                icon: "success",
                buttons: {
                    cancel: {
                      text: "Annuler",
                      value: null,
                      visible: true,
                      className: "btn btn-default",
                      closeModal: true,
                    },
                    confirm: {
                      text: "Valider",
                      value: true,
                      visible: true,
                      className: "btn btn-success",
                      closeModal: true
                    }
                  },
                dangerMode: true,
              })
            .then((willDelete) => {
            if (willDelete) {
                //{{url('admin/ajax_add_salaire1')}}
                $.ajax({
                    url: url,
                    type:"POST",
                    data:{id:id,mois:mois,salaire1:salaire1},
                    success:function(data){
                        if (data.success = 'done') {
                            window.open(`${url1}/${data.id}`,  "Recu", "width=1000,height=1400");
                            location.reload();
                        }
                                        }
                })
            }
            });
    }
    function update(url, url1) {

            swal({
                title: "vous-êtes sûre?",
                icon: "success",
                buttons: {
                    cancel: {
                      text: "Annuler",
                      value: null,
                      visible: true,
                      className: "btn btn-default",
                      closeModal: true,
                    },
                    confirm: {
                      text: "mettre à jour",
                      value: true,
                      visible: true,
                      className: "btn btn-success",
                      closeModal: true
                    }
                  },
                dangerMode: true,
              })
            .then((willDelete) => {
            if (willDelete) {
                //{{url('admin/ajax_add_salaire1')}}
                    $.ajax({
                        url: url,
                        type:"POST",
                        success:function(data){
                            if (data.success = 'data') {
                                swal("les informations sont Valider");
                                setTimeout(function(){
                                    window.location.href = url1;
                                }, 1000);
                            }
                        }
                    })
                } else {
                }
            });
    }


if (jQuery('#high-basicline-chart').length) {
    var charge1 = Number($('#charge1').val());
    var charge2 = Number($('#charge2').val());
    var charge3 = Number($('#charge3').val());
    var charge4 = Number($('#charge4').val());
    var charge5 = Number($('#charge5').val());
    var charge6 = Number($('#charge6').val());
    var charge7 = Number($('#charge7').val());
    var charge8 = Number($('#charge8').val());
    var charge9 = Number($('#charge9').val());
    var charge10 = Number($('#charge10').val());
    var charge11 = Number($('#charge11').val());
    var charge12 = Number($('#charge12').val());

    var salaire1 = Number($('#salaire1').val());
    var salaire2 = Number($('#salaire2').val());
    var salaire3 = Number($('#salaire3').val());
    var salaire4 = Number($('#salaire4').val());
    var salaire5 = Number($('#salaire5').val());
    var salaire6 = Number($('#salaire6').val());
    var salaire7 = Number($('#salaire7').val());
    var salaire8 = Number($('#salaire8').val());
    var salaire9 = Number($('#salaire9').val());
    var salaire10 = Number($('#salaire10').val());
    var salaire11 = Number($('#salaire11').val());
    var salaire12 = Number($('#salaire12').val());

    var frai1 = Number($('#frai1').val());
    var frai2 = Number($('#frai2').val());
    var frai3 = Number($('#frai3').val());
    var frai4 = Number($('#frai4').val());
    var frai5 = Number($('#frai5').val());
    var frai6 = Number($('#frai6').val());
    var frai7 = Number($('#frai7').val());
    var frai8 = Number($('#frai8').val());
    var frai9 = Number($('#frai9').val());
    var frai10 = Number($('#frai10').val());
    var frai11 = Number($('#frai11').val());
    var frai12 = Number($('#frai12').val());
    Highcharts.chart('high-basicline-chart', {

        title: {
            text: 'Les statistiques de l\'anné scolaire 2020/2021'
        },

        // subtitle: {
        //     text: 'Source: thesolarfoundation.com'
        // },

        yAxis: {
            title: {
                text: 'Montant en DH'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },

        // plotOptions: {
        //     series: {
        //         label: {
        //             connectorAllowed: false
        //         },
        //         pointStart: 1
        //     }
        // },

        xAxis: [{
            categories: [ 'Sep', 'Oct', 'Nov', 'Dec','Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug'
            ],
            crosshair: true
        }],

        series: [{
            name: 'Les frais',
            data: [frai1 , frai2, frai3, frai4, frai5, frai6, frai7, frai8, frai9, frai10, frai11, frai12],
            color: '#089bab'
        }, 
        {
            name: 'Les Salaires',
            data: [salaire1 , salaire2, salaire3, salaire4, salaire5, salaire6, salaire7, salaire8, salaire9, salaire10, salaire11, salaire12],
            color: '#e64141'
        }
        ,{
            name: 'Les charges',
            data: [charge1, charge2, charge3, charge4, charge5, charge6, charge7, charge8, charge9, charge10, charge11, charge12],
            color: '#ffc107'
        }
        //,{
        //     name: 'Project Development',
        //     data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227,11744, 17722, 16005, 19771],
        //     color: '#ffc107'
        // }, 
        // {
        //     name: 'Other',
        //     data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111,12169, 15112, 22452, 34400],
        //     color: '#17a2b8'
        // }
    ],

        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }

    });
}

if (jQuery('#high-area-chart').length) {
    Highcharts.chart('high-area-chart', {
        chart: {
            type: 'area'
        },
        accessibility: {
            description: 'Image description: An area chart compares the nuclear stockpiles of the USA and the USSR/Russia between 1945 and 2017. The number of nuclear weapons is plotted on the Y-axis and the years on the X-axis. The chart is interactive, and the year-on-year stockpile levels can be traced for each country. The US has a stockpile of 6 nuclear weapons at the dawn of the nuclear age in 1945. This number has gradually increased to 369 by 1950 when the USSR enters the arms race with 6 weapons. At this point, the US starts to rapidly build its stockpile culminating in 32,040 warheads by 1966 compared to the USSR’s 7,089. From this peak in 1966, the US stockpile gradually decreases as the USSR’s stockpile expands. By 1978 the USSR has closed the nuclear gap at 25,393. The USSR stockpile continues to grow until it reaches a peak of 45,000 in 1986 compared to the US arsenal of 24,401. From 1986, the nuclear stockpiles of both countries start to fall. By 2000, the numbers have fallen to 10,577 and 21,000 for the US and Russia, respectively. The decreases continue until 2017 at which point the US holds 4,018 weapons compared to Russia’s 4,500.'
        },
        title: {
            text: 'US and USSR nuclear stockpiles'
        },
        subtitle: {
            text: 'Sources: <a href="https://thebulletin.org/2006/july/global-nuclear-stockpiles-1945-2006">' +
                'thebulletin.org</a> &amp; <a href="https://www.armscontrol.org/factsheets/Nuclearweaponswhohaswhat">' +
                'armscontrol.org</a>'
        },
        xAxis: {
            allowDecimals: false,
            labels: {
                formatter: function() {
                    return this.value; // clean, unformatted number for year
                }
            },
            accessibility: {
                rangeDescription: 'Range: 1940 to 2017.'
            }
        },
        yAxis: {
            title: {
                text: 'Nuclear weapon states'
            },
            labels: {
                formatter: function() {
                    return this.value / 1000 + 'k';
                }
            }
        },
        tooltip: {
            pointFormat: '{series.name} had stockpiled <b>{point.y:,.0f}</b><br/>warheads in {point.x}'
        },
        plotOptions: {
            area: {
                pointStart: 1940,
                marker: {
                    enabled: false,
                    symbol: 'circle',
                    radius: 2,
                    states: {
                        hover: {
                            enabled: true
                        }
                    }
                }
            }
        },
        series: [{
            name: 'Les frais',
            data: [frai1 , frai2, frai3, frai4, frai5, frai6, frai7, frai8, frai9, frai10, frai11, frai12],
            color: '#089bab'
        }, 
        {
            name: 'Les Salaires',
            data: [salaire1 , salaire2, salaire3, salaire4, salaire5, salaire6, salaire7, salaire8, salaire9, salaire10, salaire11, salaire12],
            color: '#e64141'
        }
        ,{
            name: 'Les charges',
            data: [charge1, charge2, charge3, charge4, charge5, charge6, charge7, charge8, charge9, charge10, charge11, charge12],
            color: '#ffc107'
        }]
    });
}
