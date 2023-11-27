<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagram Editor</title>

    <!-- Include your styles.css -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <!-- Toolbar -->
    <div class="toolbar">
        <!-- Add toolbar buttons as needed -->
        <button id="zoom-in">Zoom In</button>
        <button id="zoom-out">Zoom Out</button>
        <button id="reset-items">Reset</button>
        <button id="data-flows">Data Flows</button>
        <button id="channels">Channels</button>
    </div>

    <div class="editor-container">
        <!-- Drawing Pane -->
        <div class="drawing-pane" id="drawingPane">
            <!-- The drawing pane content will be dynamically generated -->
        </div>

        <!-- Palette -->
        <div class="palette">
            <h3>Palette</h3>
            <!-- Add palette entries as needed -->
            <button id="add-new-item">Add New Item</button>
            <!-- Additional buttons for Data Flows and Channels -->
            
                <!-- Initially, no custom items in the dropdown -->
            </select>
        </div>
    </div>

    <!-- Include your script.js -->
    <script src="{{ asset('js/scripts.js') }}" defer></script>

    <script>
        // Get the drawing pane and palette elements
        const drawingPane = document.getElementById('drawingPane');
        const palette = document.querySelector('.palette');
        const addnewitem = document.getElementById('add-new-item');
        // Handle the "Add New Item" button click
        document.getElementById('add-new-item').addEventListener('click', () => {
            // Prompt the user for a name
            const itemName = prompt('Enter a name for the new item:');

            // If the user clicks "Cancel" or enters an empty name, do nothing
            if (itemName === null || itemName.trim() === '') {
                return;
            }

            // Create a new rectangle element with the entered name
            const newRectangle = document.createElement('div');
            newRectangle.className = 'rectangle';
            newRectangle.textContent = itemName;
            

            // Append the new rectangle to the drawing pane
            drawingPane.appendChild(newRectangle);

            // Create a new item bar with the entered name

            const newItemBar = document.createElement('div');
            newItemBar.className = 'item-bar';
            newItemBar.textContent = itemName;

            // Add the new item bar below the "Add Item" button
            palette.insertBefore(newItemBar, addnewitem.nextSibling);

    newItemBar.addEventListener('click', () => {

        if (event.target.tagName === 'BUTTON') {
            const selectedOption = event.target.textContent;
            const shouldEdit = confirm(`Do you want to edit "${itemName}" with option "${selectedOption}"?`);

            if (shouldEdit) {
                // Handle the selected option based on its properties
                switch (selectedOption) {
                    case 'Functions':
                        editFunctionProperties(itemName);
                        break;
                    // Add cases for other options as needed
                    default:
                        // Handle other options or show a generic edit form
                        alert(`Editing ${itemName} with option ${selectedOption}`);
                        break;
                }
            }
        }
        else {
            const shouldEdit = confirm(`Do you want to edit "${itemName}"?`);

            if (shouldEdit) {
                const optionsContainer = document.createElement('div');
                optionsContainer.className = 'options-container';

                // Add buttons for different options
                const options = ['Functions', 'Components', 'Data', 'Channels', 'Data Flow'];
                options.forEach(option => {
                    const optionButton = document.createElement('button');
                    optionButton.textContent = option;
                    optionsContainer.appendChild(optionButton);
                });

                // Display the options below the clicked item
                newItemBar.appendChild(optionsContainer);
            }
                }
            });
        });

        function editFunctionProperties(itemName) {
            // Prompt the user for function properties
            const name = prompt('Enter the function name:');
            const title = prompt('Enter the function title:');
            const description = prompt('Enter the description:');

            const existingRectangle = Array.from(drawingPane.getElementsByClassName('rectangle'))
                  .find(rectangle => elementContainsText(rectangle, itemName));

              // Update the textContent of the existing rectangle with the entered properties
              if (existingRectangle) {
                const functionLine = document.createElement('div');
                functionLine.className = 'function-line';
                functionLine.textContent = `Function: ${name}`;

                // Append the function line to the existing rectangle
                existingRectangle.appendChild(functionLine);
              }
                    
         }

        function elementContainsText(element, text) {
            return element.textContent.includes(text);
        }

        NodeList.prototype[Symbol.iterator] = Array.prototype[Symbol.iterator];
        NodeList.prototype.contains = function (text) {
            return Array.from(this).some(el => elementContainsText(el, text));
        };

        // Handle the "Reset" button click
        document.getElementById('reset-items').addEventListener('click', () => {
            // Prompt the user for confirmation
            const shouldReset = confirm('Do you want to delete all created items?');

            // If the user clicks "OK," clear all items on the drawing pane and reset the dropdown
            if (shouldReset) {
                drawingPane.innerHTML = '';
                // Clear all item bars
                const itemBars = document.querySelectorAll('.item-bar');
                itemBars.forEach(itemBar => itemBar.remove());
            }
        });

        // Variables to store the initial position of the dragged item
        let offsetX, offsetY;
        let isDragging = false;

        // Event listener for mouse down on a rectangle
        drawingPane.addEventListener('mousedown', (event) => {
            if (event.target.classList.contains('rectangle')) {
                // Set the initial position of the dragged item
                offsetX = event.clientX - event.target.getBoundingClientRect().left;
                offsetY = event.clientY - event.target.getBoundingClientRect().top;

                // Set the flag to indicate that dragging has started
                isDragging = true;
            }
        });

        // Event listener for mouse move during dragging
        document.addEventListener('mousemove', (event) => {
            if (isDragging) {
                // Calculate the new position of the dragged item
                const x = event.clientX - offsetX;
                const y = event.clientY - offsetY;

                // Move the dragged item to the new position
                drawingPane.querySelector('.rectangle').style.left = `${x}px`;
                drawingPane.querySelector('.rectangle').style.top = `${y}px`;
            }
        });

        // Event listener for mouse up to stop dragging
        document.addEventListener('mouseup', () => {
            // Reset the flag to indicate that dragging has stopped
            isDragging = false;
        });
        
        // Handle the "Data Flows" and "Channels" buttons
        document.getElementById('data-flows').addEventListener('click', () => {
            // Handle the Data Flows button click
            // You can add your logic here for Data Flows
            alert('Data Flows button clicked');
        });

        document.getElementById('channels').addEventListener('click', () => {
            // Handle the Channels button click
            // You can add your logic here for Channels
            alert('Channels button clicked');
        });
    </script>
</body>
</html>
