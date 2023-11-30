const ctx = document.getElementById('chartone');
const labels = ['Monday  ', 'Tuesday ', 'Wednesday ', 'Thursday ', 'Friday ', 'Saturday ', 'Sunday '];
const data = [25, 34, 120, 44, 64, 88];

new Chart(ctx, {
  type: 'bar',
  data: {
    labels: labels,
    datasets: [{
      label: 'Lợi Nhuận',
      data: data,
      borderWidth: 1,
      backgroundColor: 'rgba(255, 255, 255, 0.5)', // Màu trắng với độ trong suốt 0%
      borderColor: '#5856d6'
    }]
  },
  options: {
    plugins: {
      legend: {
        display: false
      }
    },
    maintainAspectRatio: false,
    scales: {
      x: {
        display: false,
      },
      y: {
        display: false,
        beginAtZero: true
      }
    }
  }
});

const ctx2 = document.getElementById('charttwo');
new Chart(ctx2, {
  type: 'line',
  data: {
    labels: labelprojects,
    datasets: [{
      label: 'All Project',
      data: projects,
      borderWidth: 1,
      backgroundColor: '#39f',
      borderColor: '#fff',
      tension: 0.5

    }]
  },
  options: {
    plugins: {
      legend: {
        display: false
      }
    },
    maintainAspectRatio: false,
    scales: {
      x: {
        display: false,
      },
      y: {
        display: false,
      }
    }
  }
});
const data3 = [6, 23, 61, 21, 6, 43];

const ctx3 = document.getElementById('chartthree');
new Chart(ctx3, {
  type: 'line',
  data: {
    labels: labelday,
    datasets: [{
      label: 'Donate',
      data: amount,
      borderWidth: 1,
      backgroundColor: '#2eb85c',
      borderColor: '#fff',
      tension: 0.5

    }]
  },
  options: {
    plugins: {
      legend: {
        display: false
      }
    },
    maintainAspectRatio: false,
    scales: {
      x: {
        display: false,
      },
      y: {
        display: false,
      }
    }
  }
});
const data4 = [25, 66, 12, 6, 35, 67];

const ctx4 = document.getElementById('chartfour');
new Chart(ctx4, {
  type: 'line',
  data: {
    labels: labelcompleteds,
    datasets: [{
      label: 'Project Completed',
      data: totalstatus,
      borderWidth: 1,
      backgroundColor: '#e55353',
      borderColor: '#fff',
      tension: 0.5
    }]
  },
  options: {
    plugins: {
      legend: {
        display: false
      }
    },
    maintainAspectRatio: false,
    scales: {
      x: {
        display: false,
      },
      y: {
        display: false,
      }
    }
  }
});
// big chart


const bigdata = [25, 34, 120, 44, 64, 88, 2, 5, 78];
const bigdata2 = [23, 5, 6, 4, 73, 23, 26, 55, 57];

const ctx5 = document.getElementById('chartbig');
new Chart(ctx5, {
  type: 'line',
  data: {
    labels: labelday,
    datasets: [{
      label: 'Donation Revenue',
      data: amount,
      borderWidth: 2,
      tension: 0.4,
      borderColor:"royalblue",
      backgroundColor: "lightblue",
      fill: true
      
    }]
  },
  options: {
    scales: {
      x: {
        grid: {
          drawOnChartArea: false,
        }
      },
      y: {
        beginAtZero: 1,
      }
    },

    maintainAspectRatio: false, // Thiết lập giữ tỷ lệ khung nhìn
  }
});
