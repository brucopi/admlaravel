@extends('adminlte::page')

@section('title', 'Site')

@section('content_header')
    <h1>Olá mundo</h1>
@stop

@section('content')

    <p>Testando Ola Mundo</p>
    <!-- Line chart -->
    <div class="card card-primary card-outline">
        <div class="card-header">
        <h3 class="card-title">
            <i class="far fa-chart-bar"></i>
            Line Chart
            
        </h3>
        
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
            </button>
        </div>
        </div>
        <div class="card-body">
        <canvas id="myChart"></canvas>
        </div>
        <!-- /.card-body-->
    </div>


    <script>

    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1
        }]
    },
    options: {
        scales: {
        y: {
            beginAtZero: true
        }
        }
    }
    });
        
    </script>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
    
@stop