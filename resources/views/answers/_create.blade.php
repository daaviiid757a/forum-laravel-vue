<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h3>Your answer</h3>
                </div>

                <hr>

                <form action="{{ route('questions.answers.store', $question->id) }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <textarea name="body" id="body" rows="7" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}"></textarea>

                        {!! $errors->first('body', '<div class="invalid-feedback"><strong>:message</strong></div>') !!}
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-outline-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
