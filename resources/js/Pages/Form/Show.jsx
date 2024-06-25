import React from 'react';
import { useForm } from '@inertiajs/react'

export default function ShowForm() {
  const { data, setData, processing, errors, post, reset, hasErrors } = useForm({
    subject: '',
    body: '',
  })

  const onSubmit = (e) => {
    e.preventDefault()

    post('/', {
      onSuccess: () => {
        reset()
      }
    })
  }

  return (
    <div className="p-8 space-y-4">
      <h1 className="text-2xl font-bold">Email form</h1>
      <p className="text-sm text-gray-700">Use this form to submit an email.</p>
      <form className="space-y-2 w-full max-w-lg" onSubmit={onSubmit} method="post">
        {hasErrors ? <div className="text-red-500 mb-5">Please correct the errors.</div> : null}
        <input className="block w-full border border-gray-500 p-1" value={data.subject} onChange={e => setData('subject', e.target.value)} type="text" name="subject" placeholder="Subject" />
        {errors.subject ? <span className="block text-red-500 font-medium">{errors.subject}</span> : null}
        <textarea className="block w-full border border-gray-500 p-1" value={data.body} onChange={e => setData('body', e.target.value)} name="body" placeholder="Email body" rows="5" />
        {errors.body ? <span className="block text-red-500 font-medium">{errors.body}</span> : null}
        <button type="submit" className="bg-gray-800 hover:bg-black text-white p-2 rounded" disabled={processing ? 'disabled' : null}>Submit form</button>
      </form>
    </div>
  );
}
