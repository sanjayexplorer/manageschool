
@if(count($students))
    @foreach ($students as $index => $student)
        <tr class="border-b hover:bg-gray-50 transition-colors duration-200">
            <td class="py-3 px-4 text-left font-medium text-gray-800">
                {{ $student->first_name }}
            </td>
            <td class="py-3 px-4 text-left">
                <span class="inline-block px-3 py-1 rounded-full text-sm
                    {{ $student->status === 'active' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                    {{ ucfirst($student->status) }}
                </span>
            </td>
            <td class="py-3 px-4 text-center space-x-2">
                <a href="{{ route('admin.students.show', $student->id) }}"
                   class="inline-block px-3 py-1 text-sm text-white bg-blue-500 rounded hover:bg-blue-600 transition">
                    View
                </a>

                <a href="{{ route('admin.students.edit', $student->id) }}"
                   class="inline-block px-3 py-1 text-sm text-white bg-yellow-500 rounded hover:bg-yellow-600 transition">
                    Edit
                </a>

                <a href="javascript:void(0);"
                   data-student-id="{{ $student->id }}"
                   data-delete-url="{{ route('admin.students.destroy', $student->id) }}"
                   class="inline-block px-3 py-1 text-sm text-white bg-red-500 rounded hover:bg-red-600 transition action-delete-btn">
                    Delete
                </a>
            </td>
        </tr>
    @endforeach
@endif
