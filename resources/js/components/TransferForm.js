import React from 'react'

const TransferForm = ({form, onChange, onSubmit}) => (
    <form 
        className="form-inline justify-content-center"
        onSubmit={onSubmit}
    >

        <input 
            type="text" 
            className="form-control mb-2 mr-sm-2" 
            id="inlineFormInputName2" 
            placeholder="Description"
            name="description"
            value={form.description}
            onChange={onChange}
        />

        <div className="input-group mb-2 mr-sm-2">
            <div className="input-group-prepend">
                <div className="input-group-text">$</div>
            </div>
            <input
                type="text" 
                className="form-control" 
                id="inlineFormInputGroupUsername2" 
                placeholder="Amount"
                name='amount'
                value={form.amount}
                onChange={onChange}
            />
        </div>

        <button 
            type="submit" 
            className="btn btn-primary mb-2"
        >
            Add
        </button>
    </form>
)

export default TransferForm