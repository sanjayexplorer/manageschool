<a href="{{ route('admin.teachers.show', $teacher->id) }}" class="text-blue-500">View</a> |
<a href="{{ route('admin.teachers.edit', $teacher->id) }}" class="text-yellow-500">Edit</a> |
<a href="javascript:void(0);" class="text-red-500 action-delete-btn"
   data-teacher-id="{{ $teacher->id }}"
   data-delete-url="{{ route('admin.teachers.destroy', $teacher->id) }}">
   Delete
</a>
