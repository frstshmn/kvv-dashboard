"use strict"

Vue.component("puncts", {
	props: ["punct", "active"],
	template: `
		<li class="p-1 punctbutton ml-4" v-bind:class="{ active: punct == active }" type="none">
	        <a class="py-2 pl-3" v-bind:class="{ disabled: punct.open == 'y'}" v-html="punct.name"></a>
	    </li>
	`
});

var app = new Vue({
	el: "#app",
	created(){
		this.fetchCurrencies();
		this.active = "Каса №1";
	},
	data: {
		active: "Салют",
		puncts: "Loading..."
	},
	methods: {
		activate: function (punct) {
            if (punct == 'Каса №1'){
                content.title = "Каса №1";
                content.id = 6;
                console.log(content.currencies);
            }
            else{
                this.active = punct;
                content.title = punct.name;
                content.id = punct.id;
            }
            $('#loading_overflow').removeClass('d-none');
			content.fetchCurrencies(content.id);
			content.Charts();
		},
		fetchCurrencies() {
        	axios.get('../scripts/data.php?type=punct_list').then(response => {
            	this.puncts = response.data;
            });
        }
	}
});

var content = new Vue({
	el: "#content",
	// updated(){
	// 	this.currencies = null;
	// 	this.fetchCurrencies(this.id);
	// },
	data:{
		id: "",
		title: "Оберіть пункт",
		currencies: [],
		data_now: [],
		data_prev: [],
	},
	methods: {
		fetchCurrencies() {
			this.currencies = [
				{"name":"UAH","buy":"<i class='fas fa-circle-notch fa-spin'></i>","sell":"<i class='fas fa-circle-notch fa-spin'></i>","count":"<i class='fas fa-circle-notch fa-spin'></i>"},
				{"name":"USD","buy":"<i class='fas fa-circle-notch fa-spin'></i>","sell":"<i class='fas fa-circle-notch fa-spin'></i>","count":"<i class='fas fa-circle-notch fa-spin'></i>"},
				{"name":"EUR","buy":"<i class='fas fa-circle-notch fa-spin'></i>","sell":"<i class='fas fa-circle-notch fa-spin'></i>","count":"<i class='fas fa-circle-notch fa-spin'></i>"},
				{"name":"PLN","buy":"<i class='fas fa-circle-notch fa-spin'></i>","sell":"<i class='fas fa-circle-notch fa-spin'></i>","count":"<i class='fas fa-circle-notch fa-spin'></i>"},
				{"name":"RUB","buy":"<i class='fas fa-circle-notch fa-spin'></i>","sell":"<i class='fas fa-circle-notch fa-spin'></i>","count":"<i class='fas fa-circle-notch fa-spin'></i>"},
				{"name":"BYR","buy":"<i class='fas fa-circle-notch fa-spin'></i>","sell":"<i class='fas fa-circle-notch fa-spin'></i>","count":"<i class='fas fa-circle-notch fa-spin'></i>"}
			];
			var link = '../scripts/data.php?type=punct_currency&value='+this.id;
        	axios.get(link).then(response => {
				
            	this.currencies = response.data;
            });
        },
		
		Charts(){
			this.fetchDataOutcome();
			this.fetchDataIncome();
		},

        fetchDataOutcome() {
			var link = '../scripts/data.php?type=punct_data_outcome&value='+this.id;
        	axios.get(link).then(response => {
            	myChart.data.datasets[0].data = response.data;
            	myChart.update();
                $('#loading_overflow').addClass('d-none');
            });
        },

        fetchDataIncome() {
        	var link = '../scripts/data.php?type=punct_data_income&value='+this.id;
        	axios.get(link).then(response => {
            	myChart.data.datasets[1].data = response.data;
            	myChart.update();
                $('#loading_overflow').addClass('d-none');
            	//myChart.options.title.text = "Об'єм";
            });
        },
	}
});

Chart.defaults.global.defaultFontColor = 'white';
Chart.defaults.global.defaultFontFamily = 'Verdana';
var ctx = document.getElementById('uah_data_day');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
    	labels: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31],
        datasets: [{
            label: 'Видано',
            data: [],
            pointBorderColor: 'rgba(255, 255, 255, 1)',
            borderColor: 'rgba(255, 255, 255, 1)',
            backgroundColor: [
                'rgba(255, 255, 255, 0)'
            ],
            borderWidth: 2,
            lineTension: 0.1,
        },
        {
            label: 'Прийнято',
            data: [],
            pointBorderColor: 'rgba(56, 151, 122, 1)',
            borderColor: 'rgba(56, 151, 122, 1)',
            backgroundColor: [
                'rgba(255, 255, 255, 0)'
            ],
            pointStyle: 'line',
            pointHoverBorderColor: 'rgba(255, 255, 255, 1)',
            pointHoverBorderWidth: 2,
            borderWidth: 2,
            lineTension: 0.1,
        }]
    },
    options: {
    	responsive: true,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});