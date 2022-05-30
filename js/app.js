//carga el vue.js con el cambio de monedas y los resultados bases
new Vue({
    el: "#app",

    data:{
        monedas: {},
        cantidad: 0,
        from: 'USD',
        to: 'ARS',
        result: 0
    },

//llama a los datos ingresados
    mounted(){
        this.getMonedas();
    },

//detalles a la hora de imprimir resultados 
    computed:{
        formatearMonedas(){
            return Object.values(this.monedas);
        },
        calcularResultado(){
            return(Number(this.cantidad) * this.result + (Number(this.cantidad) * this.result) * 65 / 100).toFixed(3);
        },
        monedaConvertida(){
            return this.to;
        },
        simboloMoneda(){
            return this.simbolo;
        },
        deshabilitado(){
            return this.cantidad === 0 || !this.cantidad;
        }
    },
    
//funciones para el cambio, agarra el resultado base y lo convierte con la datos recibidos de la api de CurrencyConverter
    methods:{
        getMonedas(){
            const monedas = localStorage.getItem("monedas");

            if(monedas){
                this.monedas = JSON.parse(monedas);
                return;
            }

            axios.get('https://free.currencyconverterapi.com/api/v6/currencies?apiKey=61e2cf5fb6b05e1ee580').then(response =>{
                this.monedas = response.data.results;
                localStorage.setItem('monedas', JSON.stringify(response.data.results));
                //console.log(response);
            });
        },

        convertirMoneda(){
            const busqueda = `${this.from}_${this.to}`;
            axios.get(`https://free.currencyconverterapi.com/api/v6/convert?q=${busqueda}&apiKey=61e2cf5fb6b05e1ee580`)
            .then((response) =>{
                console.log(response);
                this.result = response.data.results[busqueda].val;
            });
        }
    },

//base 0 para el cambio, 'de/a'
    watch:{
        from(){
            this.result = 0;
        },
        to(){
            this.result = 0;
        }
    }
});