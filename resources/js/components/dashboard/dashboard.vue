<template>
    <div id="report">
        <h4>Báo cáo công việc</h4>
        <div class="container-fluid main">
            <notifications position="top right" />
            <div class="row">
                <div class="col-6">
                    <div class="chart-title" style="background-color: rgba(193, 161, 44, 1);">
                        <h4>Loại công việc</h4>
                    </div>
                    <div class="chart">
                        <canvas ref="chartTypeofWork"></canvas>
                    </div>
                </div>
                <div class="col-6">
                    <div class="chart-title" style="background: rgba(90, 162, 60, 1);">
                        <h4>Mức độ ưu tiên</h4>
                    </div>
                    <div class="chart">
                        <canvas ref="chartPriority"></canvas>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 justify-content-center">
                    <div class="chart-title" style="background: rgba(39, 143, 162, 1);">
                        <h4>Trạng thái</h4>
                    </div>
                    <div class="chart">
                        <canvas ref="chartStatus"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
import Chart from 'chart.js/auto';
import authHeader from '/var/www/html/myproject/myproject/resources/js/auth-header.js';
export default {
    data() {
    return {
      chart: null,
      dataTypeOfWork: null,
      dataPriority: null,
      dataStatus: null,

    };
  },
  mounted() {
    this.getTypeOfWork();
    this.getPriority();
    this.getStatus();
  },
  methods: {

    getTypeOfWork(){
        axios.get("/api/type_of_work", {headers: authHeader()}).then(res =>{
                this.dataTypeOfWork = res.data;
                this.renderChart_1();
            });
    },
    getPriority(){
        axios.get("/api/priority", {headers: authHeader()}).then(res =>{
                this.dataPriority = res.data;
                this.renderChart_2();
            });
    },
    getStatus(){
        axios.get("/api/status", {headers: authHeader()}).then(res =>{
                this.dataStatus = res.data;
                this.renderChart_3();
            });
    },
    renderChart_1() {
      const ctx = this.$refs.chartTypeofWork.getContext('2d');
      this.chart = new Chart(ctx, {
        type: 'pie',
        data: {
          labels: ['Phức tạp', 'Đơn giản'],
          datasets: [{
            data: this.dataTypeOfWork,
            backgroundColor: ['#FF6384', '#36A2EB'],
          }],
        },
      });
    },
    renderChart_2() {
      const ctx = this.$refs.chartPriority.getContext('2d');
      this.chart = new Chart(ctx, {
        type: 'pie',
        data: {
          labels: ['Khẩn cấp', 'Cao', 'Trung bình', 'Thấp'],
          datasets: [{
            data: this.dataPriority, 
            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#0DB8DE'],
          }],
        },
      });
    },
    renderChart_3() {
      const ctx = this.$refs.chartStatus.getContext('2d');
      this.chart = new Chart(ctx, {
        type: 'pie',
        data: {
          labels: ['Đã hoàn thành', 'Đang thực hiện', 'Tạm dừng', 'Hủy'],
          datasets: [{
            data: this.dataStatus,
            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#0DB8DE'],
          }],
        },
      });
    },
  },
    
}
</script>
<style>
.chart-title{
    color: white;
    padding: 1em 5em;
    box-sizing: content-box;
    display: flex;
    align-items: center;
    justify-content: center;
}
.chart {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 300px;
}
</style>