<!-- Modal -->
<div class="modal fade" id="modal_project_delete" tabindex="-1" aria-labelledby="modal_project_delete" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal_project_delete_label">Delete project?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="custom_message">Are you sure you want to delete that project?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger" type="submit">DELETE</button>
                </form>
            </div>
        </div>
    </div>
</div>