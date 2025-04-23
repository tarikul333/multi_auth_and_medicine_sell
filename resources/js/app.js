import './bootstrap';

import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

import $ from 'jquery';
window.$ = window.jQuery = $;

$(document).ready(function() {
    $('#city').change(function() {
        let cityID = $(this).val();
        if (cityID) {
            $.ajax({
                url: '/employee/get-stores/' + cityID,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('#store').empty().append('<option value="">Select Store</option>');
                    $.each(data, function(key, value) {
                        $('#store').append('<option value="'+ value.id +'">'+ value.store_name +'</option>');
                    });
                }
            });
        } else {
            $('#store').empty().append('<option value="">Select Store</option>');
        }
    });

    let index = 1;
    $('#add-medicine').click(function() {
        let optionsHtml = '<option value="">Select Medicine</option>';
        medicineOptions.forEach(function(med) {
            optionsHtml += `<option value="${med.id}">${med.medicine_name}</option>`;
        });

        let html = `
            <div class="medicine-item bg-gray-50 p-4 rounded-lg fade-in">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Medicine</label>
                        <select name="medicines[${index}][medicine_id]" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 pl-2">
                            ${optionsHtml}
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Quantity</label>
                        <input type="number" name="medicines[${index}][quantity]" min="1" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 pl-2">
                    </div>
                    <div class="flex items-end">
                        <button type="button" class="remove-medicine text-red-600 hover:text-red-800">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>`;
        
        $('#medicine-list').append(html);
        index++;
    });


    $(document).on('click', '.remove-medicine', function() {
        $(this).closest('.medicine-item').fadeOut(300, function() {
            $(this).remove();
        });
    });
});


