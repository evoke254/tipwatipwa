import React from 'react'
import MainLayout from '../main/MainLayout.component'

const QuestionsCreate = () => {
    return (
        <MainLayout>
            <div className="container-fluid">
  <div className="row d-flex">
    <div className="col-md">
      @if(\Request::is('*edit'))
      <form method="post" action="/admin/questions/{{$content->id}}" encType="multipart/form-data">
        @method('patch')
        @else
        @endif
        @csrf
        <div className="row d-flex justify-content-center">
          <div className="col-md-6">
            <div className="form-group">
              <label htmlFor="title">Question</label>
              <textarea className="form-control" id="question" name="question" aria-describedby="question" value="{{$content->question ?? ''}}" required defaultValue={"{{$content->question ?? ''}}\n\t\t\t\t    "} />
            </div>
          </div>
          <div className="col-md-6">
            <div className="form-group">
              <label htmlFor="title">Answer</label>
              <textarea className="form-control" id="answer" name="answer" aria-describedby="answer" value="{{$content->answer ?? ''}}" required defaultValue={" {{$content->answer ?? ''}}\n\t\t\t\t    "} />
            </div>
          </div>
          <div className="col-md my-5">
            <button type="submit" className="btn btn-success btn-md text-center">Create | Update</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

        </MainLayout>
    )
}

export default QuestionsCreate
