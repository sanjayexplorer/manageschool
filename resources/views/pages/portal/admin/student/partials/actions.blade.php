<a href="{{ route('admin.students.show', $student->id) }}" class="text-blue-500">View</a> |
<a href="{{ route('admin.students.edit', $student->id) }}" class="text-yellow-500">Edit</a> |
<a href="javascript:void(0);" class="text-red-500 action-delete-btn"
   data-student-id="{{ $student->id }}"
   data-delete-url="{{ route('admin.students.destroy', $student->id) }}">
   Delete
</a>
