
@foreach ($students as $index => $student)
@php
    $attendance = $student->attendanceForDate($attendanceDate);
@endphp

<tr class="hover:bg-gray-50">
    
    <td class="px-4 py-3 border text-sm font-medium text-gray-800 error_tr">
    <div>
        <strong>{{ $student->first_name }} {{ $student->last_name }}</strong>
        <span class="scrollForReq error-message"></span>
    </div>

    <div class="mt-1 text-sm text-gray-600">
        <p><strong>Guardian's Name:</strong> Mr. John Doe</p>
        <p><strong>Guardian's Phone:</strong> +91-9876543210</p>
    </div>

    <div class="mt-1 text-sm text-gray-600">
        <p><strong>Fee Paid:</strong> ₹15,000</p>
        <p><strong>Fee Due:</strong> ₹5,000</p>
        <p><strong>Status:</strong> <span class="text-yellow-600">Partial</span></p>
    </div>
</td>

    <td class="border bg-yellow-100 text-center">
        <label class="inline-flex items-center justify-center w-full h-full p-2 cursor-pointer">
            <input
                type="radio"
                name="attendance[{{ $student->id }}]"
                value="late"
                class="sr-only peer attendance_radio hidden"
                data-student-id="{{ $student->id }}"
                {{ $attendance && $attendance->status === 'late' ? 'checked' : '' }}
            />
            <div class="w-5 h-5 rounded-full border-2 border-yellow-500 peer-checked:bg-yellow-500 transition-colors"></div>
        </label>
    </td>

    <td class="border bg-red-100 text-center">
        <label class="inline-flex items-center justify-center w-full h-full p-2 cursor-pointer">
            <input
                type="radio"
                name="attendance[{{ $student->id }}]"
                value="absent"
                class="sr-only peer attendance_radio hidden"
                data-student-id="{{ $student->id }}"
                {{ $attendance && $attendance->status === 'absent' ? 'checked' : '' }}
            />
            <div class="w-5 h-5 rounded-full border-2 border-red-500 peer-checked:bg-red-500 transition-colors"></div>
        </label>
    </td>

    <td class="border bg-green-100 text-center">
        <label id="[{{ $student->id }}]" class="inline-flex items-center justify-center w-full h-full p-2 cursor-pointer">
            <input
                type="radio"
                name="attendance[{{ $student->id }}]"
                value="present"
                class="sr-only peer attendance_radio hidden"
                data-student-id="{{ $student->id }}"
                {{ $attendance && $attendance->status === 'present' ? 'checked' : '' }}
            />
            <div class="w-5 h-5 rounded-full border-2 border-green-500 peer-checked:bg-green-500 transition-colors"></div>
        </label>
    </td>
    
</tr>
@endforeach
