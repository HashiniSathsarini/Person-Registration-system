<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
      
      <!-- Total Persons -->
      <div class="bg-white p-6 rounded-xl shadow text-center text-2xl font-bold text-gray-700">
        Total Registered Persons: <span class="text-blue-600">{{ $data['total'] }}</span>
      </div>

      <!-- Age Group Chart -->
      <div class="bg-white p-6 rounded-xl shadow">
        <h2 class="text-xl font-semibold mb-4 text-gray-800">Persons by Age Group</h2>
        <canvas id="ageGroupChart"></canvas>
      </div>

      <!-- Birth Month Chart -->
      <div class="bg-white p-6 rounded-xl shadow">
        <h2 class="text-xl font-semibold mb-4 text-gray-800">Persons by Birth Month</h2>
        <canvas id="birthMonthChart"></canvas>
      </div>

      <!-- Religion Pie Chart -->
      <!-- <div class="bg-white p-6 rounded-xl shadow">
        <h2 class="text-xl font-semibold mb-4 text-gray-800">Persons by Religion</h2>
        <canvas id="religionChart"></canvas>
      </div> -->

    </div>
  </div>

  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script>
    // Get dynamic data from Blade
    const ageGroupData = {!! json_encode(array_values($data['ageGroups'])) !!};
  const birthMonthData = {!! json_encode(array_values($data['birthMonths'])) !!};
  const religionLabels = {!! json_encode(array_keys($data['religions'] ?? [])) !!};
  const religionData = {!! json_encode(array_values($data['religions'] ?? [])) !!};

    // Age Group Chart
    new Chart(document.getElementById('ageGroupChart'), {
      type: 'bar',
      data: {
        labels: ['18–30', '31–50', '51+'],
        datasets: [{
          label: 'Persons',
          data: ageGroupData,
          backgroundColor: ['#3b82f6', '#10b981', '#f59e0b'],
          borderRadius: 5
        }]
      },
      options: {
        responsive: true,
        plugins: { legend: { display: false } }
      }
    });

    // Birth Month Chart
    new Chart(document.getElementById('birthMonthChart'), {
      type: 'bar',
      data: {
        labels: [
          'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
          'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
        ],
        datasets: [{
          label: 'Persons',
          data: birthMonthData,
          backgroundColor: '#6366f1',
          borderRadius: 5
        }]
      },
      options: {
        responsive: true,
        plugins: { legend: { display: false } }
      }
    });

    // Religion Pie Chart
    new Chart(document.getElementById('religionChart'), {
      type: 'pie',
      data: {
        labels: religionLabels,
        datasets: [{
          data: religionData,
          backgroundColor: ['#ef4444', '#3b82f6', '#10b981', '#f59e0b', '#8b5cf6']
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'bottom'
          }
        }
      }
    });
  </script>

</x-app-layout>
