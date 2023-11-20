<template>
    <div class="sidebar">
        <div class="item">
            <img :src="report" class="icon" alt="report">
            <span class="text-dark fw-normal" style="margin-left: 10px">Dashboard</span>
        </div>
        <hr />
        <div class="item">
            <img :src="task" class="icon" alt="task">
            <span class="text-dark fw-normal" style="margin-left: 10px">Working</span>
        </div>
        <hr />
        <div class="item">
            <img :src="calendar" class="icon" alt="calendar">
            <span class="text-dark fw-normal" style="margin-left: 10px">Calendar</span>
        </div>
        <hr />
        <div class="item">
            <img :src="help" class="icon" alt="help">
            <span class="text-dark fw-normal" style="margin-left: 10px">Support</span>
        </div>
    </div>
</template>
<script>
import report from 'D:/project/myproject/resources/assets/icon/dashboard-icon.svg';
import task from 'D:/project/myproject/resources/assets/icon/task-icon.svg';
import calendar from 'D:/project/myproject/resources/assets/icon/calendar-icon.svg';
import help from 'D:/project/myproject/resources/assets/icon/help-icon.svg';
// import report from 'D:/project/myproject/resources/assets/icon/dashboard-icon.svg';
    export default {
        data(){
            return {
                report: report,
                task: task,
                calendar: calendar,
                help: help,
            }
     }
    }
</script>
<style>
.sidebar{
    width: 50px;
    height: 100%;
    padding: 10px;
    background-color: #ffffff;
    transition: ease-in-out 0.3s;
    overflow: hidden;
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
}
.sidebar:hover{
    width: 200px;
}
.sidebar:hover > .item > text{
    opacity: 1;
}
hr{
    height: 1px;
    color: #919191;
    margin: 15px 0;
}
.item{
    display: flex;
    align-items: center;
    margin: 20px 0;
}
.item .icon{
    width: 30px;
    height: 35px;
    flex-shrink: 0;
    fill: #424242;
}
.item .span{
    opacity: 0;
    transition: ease-in-out 00.3s;
    transition-delay: .2s;
    margin-left: 15px;
    white-space: nowrap;
}
</style>
