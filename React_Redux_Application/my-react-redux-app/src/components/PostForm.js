import React, { useState } from 'react';
import { useDispatch } from 'react-redux';
import { addPost } from '../reducer/slices/postSlice';

const PostForm = () => {
  const [title, setTitle] = useState('');
  const [body, setBody] = useState('');
  const dispatch = useDispatch();

  const handleSubmit = (e) => {
    e.preventDefault();
    const newPost = {
      id: Date.now(),
      title,
      body,
    };
    dispatch(addPost(newPost));
    setTitle('');
    setBody('');
  };

  return (
  <div className="d-flex justify-content-center align-items-center">
    <form style={{ maxWidth: '500px' }} onSubmit={handleSubmit} >
      <h2>Thêm bài viết mới</h2>
      <div class="mb-3">
        <label for="form_title" class="form-label">Title</label>
        <input type="text" class="form-control" id="form_title" placeholder="Title" value={title} onChange={(e) => setTitle(e.target.value)} required/>
      </div>
      <div class="mb-3">
        <label for="form_content" class="form-label">Content</label>
        <textarea class="form-control" id="form_content" rows="3" value={body}  placeholder="Content" onChange={(e) => setBody(e.target.value)} required/>
      </div>
      <button class="btn btn-primary" type="submit">Thêm</button>
    </form>
  </div>  
  );
};

export default PostForm;
