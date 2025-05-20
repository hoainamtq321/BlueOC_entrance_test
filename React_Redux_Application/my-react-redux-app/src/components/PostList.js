import React, { useEffect } from 'react';
import { useDispatch, useSelector } from 'react-redux';
import { fetchPosts } from '../reducer/slices/postSlice';

const PostList = () => {
  const { posts, loading, error } = useSelector((state) => state.posts);
  const dispatch = useDispatch();

  useEffect(() => {
    dispatch(fetchPosts());
  }, [dispatch]);

  if (loading) return <p>Đang tải...</p>;
  if (error) return <p>Lỗi: {error}</p>;

  return (
    <div className="container mt-4">
      <h3 className="mb-4">Danh sách bài viết</h3>
      <div className="row">
        {posts.slice(0, 10).map((post, index) => (
          <div className="col-md-6 col-lg-4 mb-4" key={index}>
            <div className="card h-100 shadow-sm">
              <div className="card-body">
                <h5 className="card-title">{post.title}</h5>
                <p className="card-text">{post.body}</p>
              </div>
            </div>
          </div>
        ))}
      </div>
    </div>
  );
};

export default PostList;
