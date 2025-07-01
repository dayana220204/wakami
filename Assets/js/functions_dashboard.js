$('.date-picker').datepicker( {
    closeText: 'Cerrar',
	prevText: '<Ant',
	nextText: 'Sig>',
	currentText: 'Hoy',
	monthNames: ['1 -', '2 -', '3 -', '4 -', '5 -', '6 -', '7 -', '8 -', '9 -', '10 -', '11 -', '12 -'],
	monthNamesShort: ['Enero','Febrero','Marzo','Abril', 'Mayo','Junio','Julio','Agosto','Septiembre', 'Octubre','Noviembre','Diciembre'],
    changeMonth: true,
    changeYear: true,
    showButtonPanel: true,
    dateFormat: 'MM yy',
    showDays: false,
    onClose: function(dateText, inst) {
        $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
    }
});

$(function() {
  const currentDate = new Date();
  const currentYear = currentDate.getFullYear();
  const nextYear = currentYear + 1;

  $('.month-picker').datepicker({
    closeText: 'Cerrar',
    prevText: '<Ant',
    nextText: 'Sig>',
    currentText: 'Mes actual',
    monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    monthNamesShort: ['Enero', 'Feb', 'Mar', 'Abr', 'Mayo', 'Jun', 'Jul', 'Ago', 'Sept', 'Oct', 'Nov', 'Dic'],
    changeMonth: true,
    changeYear: true,
    showButtonPanel: true,
    dateFormat: 'MM yy',
    showDays: false,
    minDate: currentDate,
    maxDate: new Date(nextYear, 11, 31),
    onClose: function(dateText, inst) {
      $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
    }
  });
});

function fntSearchPagos(){
    let fecha = document.querySelector(".pagoMes").value;
    if(fecha == ""){
        swal("", "Seleccione mes y año" , "error");
        return false;
    }else{
        let request = (window.XMLHttpRequest) ? 
            new XMLHttpRequest() : 
            new ActiveXObject('Microsoft.XMLHTTP');
        let ajaxUrl = base_url+'/Dashboard/tipoPagoMes';
        divLoading.style.display = "flex";
        let formData = new FormData();
        formData.append('fecha',fecha);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
            if(request.readyState != 4) return;
            if(request.status == 200){
                $("#pagosMesAnio").html(request.responseText);
                divLoading.style.display = "none";
                return false;
            }
        }
    }
}

async function getData() {
  const data = [
    { Cotizaciones: 5, Mes: 1 },
    { Cotizaciones: 2, Mes: 2 },
    { Cotizaciones: 3, Mes: 3 },
    { Cotizaciones: 5, Mes: 4 },
    { Cotizaciones: 4, Mes: 5 },
    { Cotizaciones: 1, Mes: 6 },
    { Cotizaciones: 4, Mes: 7 },
    { Cotizaciones: 2, Mes: 8 },
    { Cotizaciones: 3, Mes: 9 },
    { Cotizaciones: 5, Mes: 10 },
    { Cotizaciones: 4, Mes: 11 },
    { Cotizaciones: 6, Mes: 12 },
  ];

  return data;
}

function convertToTensor(data) {
  return tf.tidy(() => {
    const inputs = data.map(d => d.Mes);
    const labels = data.map(d => d.Cotizaciones);

    const inputTensor = tf.tensor2d(inputs, [inputs.length, 1]);
    const labelTensor = tf.tensor2d(labels, [labels.length, 1]);

    const inputMax = inputTensor.max();
    const inputMin = inputTensor.min();
    const labelMax = labelTensor.max();
    const labelMin = labelTensor.min();

    const normalizedInputs = inputTensor.sub(inputMin).div(inputMax.sub(inputMin));
    const normalizedLabels = labelTensor.sub(labelMin).div(labelMax.sub(labelMin));

    return {
      inputs: normalizedInputs,
      labels: normalizedLabels,
      inputMax,
      inputMin,
      labelMax,
      labelMin,
    };
  });
}

async function loadModel() {
  try {
    const model = await tf.loadLayersModel(base_url+'/Assets/js/npmETheRRRealistLine.json');
    console.log('Modelo cargado desde el archivo');
    return model;
  } catch (error) {
    console.error('No se pudo cargar el modelo', error);
    return null;
  }
}

function testLoadModel(model, inputData, normalizationData) {
  const { inputMax, inputMin, labelMin, labelMax } = normalizationData;

  const [xs, preds] = tf.tidy(() => {
    const xs = tf.linspace(0, 1, 24);
    const preds = model.predict(xs.reshape([24, 1]));

    const unNormXs = xs.mul(inputMax.sub(inputMin)).add(inputMin);
    const unNormPreds = preds.mul(labelMax.sub(labelMin)).add(labelMin);

    return [unNormXs.dataSync(), unNormPreds.dataSync()];
  });

  const predictedPoints = Array.from(xs).map((val, i) => {
    return { x: val, y: preds[i] };
  });

  const originalPoints = inputData.map(d => ({
    x: parseFloat(d.Mes),
    y: parseFloat(d.Cotizaciones),
  }));
 
  const months = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
  const currentYear = new Date().getFullYear();
  const labels = [];

  for (let year = currentYear; year <= currentYear + 1; year++) {
    const yearTwoDigits = year.toString().slice(-2);
    for (let month of months) {
      labels.push(`${month} - ${yearTwoDigits}`);
    }
  }

  const ctx = document.getElementById('myChart').getContext('2d');

  new Chart(ctx, {
    type: 'scatter',
    data: {
      datasets: [{
        label: 'Datos Originales',
        data: originalPoints,
        borderColor: '#009688',
        pointRadius: 7,
        pointBorderWidth: 3,
        backgroundColor: '#fff'
      }, {
        label: 'Predicciones',
        data: predictedPoints,
        borderColor: '#f6902d',
        pointRadius: 4,
        pointBorderWidth: 2,
        backgroundColor: '#fff'
      }]
    },
    options: {
      scales: {
        x: {
          type: 'category',
          position: 'bottom',
          labels: labels,
          title: {
            display: true,
            text: 'Meses'
          }
        },
        y: {
          type: 'linear',
          position: 'left',
          title: {
            display: true,
            text: 'Cotizaciones'
          }
        }
      }
    }
  });
}

async function run() {
  const data = await getData();
  const model = await loadModel();
  if (model) {
    const tensorData = convertToTensor(data);
    testLoadModel(model, data, tensorData);
  } else {
    console.error('El modelo no se cargó correctamente');
  }
}

document.addEventListener('DOMContentLoaded', run);

async function predecirCotizacion() {
  let mes = document.querySelector(".freeMes").value; 

  if (!mes){
    swal("", "Seleccione mes para predecir" , "warning");
    return;
  }

  const monthMap = {
    "Enero": 1,
    "Febrero": 2,
    "Marzo": 3,
    "Abril": 4,
    "Mayo": 5,
    "Junio": 6,
    "Julio": 7,
    "Agosto": 8,
    "Septiembre": 9,
    "Octubre": 10,
    "Noviembre": 11,
    "Diciembre": 12
  };
  
  let [monthName, year] = mes.split(" ");
  year = parseInt(year);
  
  let monthNumber = monthMap[monthName];
  const currentYear = new Date().getFullYear();
  
  if (year > currentYear) {
    monthNumber += 12; // Si es el siguiente año, sumar 12
  }

  const model = await loadModel();
  if (!model) return;

  const data = await getData();
  const tensorData = convertToTensor(data);
  const { inputMax, inputMin, labelMax, labelMin } = tensorData;

  const normalizedMes = (parseFloat(monthNumber) - inputMin.dataSync()) / (inputMax.dataSync() - inputMin.dataSync());
  const prediction = model.predict(tf.tensor2d([normalizedMes], [1, 1]));
  const denormalizedPrediction = prediction.mul(labelMax.sub(labelMin)).add(labelMin).dataSync()[0];

  const previousMes = monthNumber > 1 ? monthNumber - 1 : 1;
  const normalizedPreviousMes = (parseFloat(previousMes) - inputMin.dataSync()) / (inputMax.dataSync() - inputMin.dataSync());
  const previousPrediction = model.predict(tf.tensor2d([normalizedPreviousMes], [1, 1]));
  const denormalizedPreviousPrediction = previousPrediction.mul(labelMax.sub(labelMin)).add(labelMin).dataSync()[0];

  const increasePercentage = ((denormalizedPrediction - denormalizedPreviousPrediction) / denormalizedPreviousPrediction) * 100;

  document.getElementById('mesSelectPredict').innerHTML = `<i class="fa fa-slack" aria-hidden="true"></i>&nbsp;Cantidad: ${denormalizedPrediction.toFixed(0)}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-bar-chart" aria-hidden="true"></i>&nbsp;Incremento: ${increasePercentage.toFixed(2)}%`;
}

function fntSearchVMes(){
    let fecha = document.querySelector(".ventasMes").value;
    if(fecha == ""){
        swal("", "Seleccione mes y año" , "error");
        return false;
    }else{
        let request = (window.XMLHttpRequest) ? 
            new XMLHttpRequest() : 
            new ActiveXObject('Microsoft.XMLHTTP');
        let ajaxUrl = base_url+'/Dashboard/ventasMes';
        divLoading.style.display = "flex";
        let formData = new FormData();
        formData.append('fecha',fecha);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
            if(request.readyState != 4) return;
            if(request.status == 200){
                $("#graficaMes").html(request.responseText);
                divLoading.style.display = "none";
                return false;
            }
        }
    }
}

function fntSearchVAnio(){
    let anio = document.querySelector(".ventasAnio").value;
    if(anio == ""){
        swal("", "Ingrese año " , "error");
        return false;
    }else{
        let request = (window.XMLHttpRequest) ? 
            new XMLHttpRequest() : 
            new ActiveXObject('Microsoft.XMLHTTP');
        let ajaxUrl = base_url+'/Dashboard/ventasAnio';
        divLoading.style.display = "flex";
        let formData = new FormData();
        formData.append('anio',anio);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
            if(request.readyState != 4) return;
            if(request.status == 200){
                $("#graficaAnio").html(request.responseText);
                divLoading.style.display = "none";
                return false;
            }
        }
    }
}