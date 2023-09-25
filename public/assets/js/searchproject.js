// Loop to create clearData function for Machine Model1, Machine Model2, and Machine Model3
for (let i = 1; i <= 3; i++) {
    document.getElementById(`clearButton${i}`).addEventListener('click', () => clearData(i));
  }

  function clearData(modelNumber) {
    // Clear radio inputs
    const selectedOrigin = document.querySelector(`input[name="origin_country_id${modelNumber}"]:checked`);
    if (selectedOrigin) {
      selectedOrigin.checked = false;
    }
  
    const selectedOilType = document.querySelector(`input[name="oil_type${modelNumber}"]:checked`);
    if (selectedOilType) {
      selectedOilType.checked = false;
    }
  
    const selectedCoolerType = document.querySelector(`input[name="cooler_type${modelNumber}"]:checked`);
    if (selectedCoolerType) {
      selectedCoolerType.checked = false;
    }
  
    const selectedInverter = document.querySelector(`input[name="inverter_flg${modelNumber}"]:checked`);
    if (selectedInverter) {
      selectedInverter.checked = false;
    }
  
    // Clear input text "Power"
    const powerInput = document.querySelector(`input[name="power${modelNumber}"]`);
    if (powerInput) {
      powerInput.value = "";
    }
  
    // Clear the label element
    const labelElement = document.getElementById(`machinemodel${modelNumber}_label`);
    labelElement.textContent = "";
    const hiddenInput = document.getElementById(`machinemodel${modelNumber}_id`);
    hiddenInput.value = "";
  
    // Clear the input element
    const qtyInput = document.getElementById(`machinemodel${modelNumber}_qty`);
    qtyInput.value = "";
  
    // Clear the selected data container
    const selectedDataContainer = document.getElementById(`selectedDataContainer${modelNumber}`);
    selectedDataContainer.innerHTML = "";
  }
  
  // Loop to create event listeners for search buttons of Machine Model1, Machine Model2, and Machine Model3
for (let i = 1; i <= 3; i++) {
    document.getElementById(`searchButton${i}`).addEventListener('click', () => searchData(i));
  }
  
  function searchData(modelNumber) {
    // Get the selected values from the radio inputs
    const selectedOrigin = document.querySelector(`input[name="origin_country_id${modelNumber}"]:checked`);
    const selectedOilType = document.querySelector(`input[name="oil_type${modelNumber}"]:checked`);
    const selectedCoolerType = document.querySelector(`input[name="cooler_type${modelNumber}"]:checked`);
    const selectedInverter = document.querySelector(`input[name="inverter_flg${modelNumber}"]:checked`);
  
    // Get the value from the Power input
    const powerInput = document.querySelector(`input[name="power${modelNumber}"]`);
    const powerValue = powerInput ? powerInput.value : "";
  
    // Prepare the data to send to the server
    const searchData = {
      origin_country_id: selectedOrigin ? selectedOrigin.value : "",
      oil_type: selectedOilType ? selectedOilType.value : "",
      cooler_type: selectedCoolerType ? selectedCoolerType.value : "",
      inverter_flg: selectedInverter ? selectedInverter.value : "",
      power: powerValue,
    };
  
    // Send the data to the server using Fetch API
    fetch('/search', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      },
      body: JSON.stringify(searchData),
    })
      .then(response => response.json())
      .then(data => {
        console.log(data);
        // Clear the container before displaying new data
        const selectedDataContainer = document.getElementById(`selectedDataContainer${modelNumber}`);
        selectedDataContainer.innerHTML = "";
  
        // Display the selected data in the container
        data.forEach(machine => {
            const machinemodelName = machine.machinemodel_name;
            const machinemodelId = machine.id;
          
            const pElement = document.createElement('p');
            pElement.textContent = `Machine Model Name:  ${machinemodelName}`;
            selectedDataContainer.appendChild(pElement);
          
            // Add event listener to the created paragraph element to display the selected machine model name
            pElement.addEventListener('click', function() {
                const labelElement = document.getElementById(`machinemodel${modelNumber}_label`);
                labelElement.textContent = machinemodelName;
                const hiddenInput = document.getElementById(`machinemodel${modelNumber}_id`);
                hiddenInput.value = machinemodelId;
            });
          });
          
  
        // If there are no results, display a message
        if (data.length === 0) {
          const pElement = document.createElement('p');
          pElement.textContent = "No matching records found.";
          selectedDataContainer.appendChild(pElement);
        }
      })
      .catch(error => {
        console.error('Error fetching data:', error);
      });
  }
  