import React, { useEffect, useState } from "react";
import Authenticated from "@/Layouts/Authenticated";
import { Head } from "@inertiajs/inertia-react";

export default function Dishes(props) {
    console.log(props.dishes);

    const [dishes, setDishes] = useState([]);
    const [restorantSort, setRestorantSort] = useState("asc");

    useEffect(() => {
        setDishes(props.dishes);
    }, props.dishes);

    const sortHandler = (item) => {
        const sortedRestorants = [...props.dishes].sort((a, b) => {
            if (restorantSort === "asc") {
                setRestorantSort("desc");
                return a[item] > b[item] ? 1 : -1;
            } else {
                setRestorantSort("asc");
                return a[item] > b[item] ? -1 : 1;
            }
        });
        setDishes(sortedRestorants);
    };

    const searchHandler = (e) => {
        const filteredDishes = props.dishes.filter((dish) => {
            return dish.title.toLowerCase().includes(e.target.value);
        });
        setDishes(filteredDishes);
    };

    return (
        <Authenticated
            auth={props.auth}
            errors={props.errors}
            header={
                <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                    Dishes
                </h2>
            }
        >
            <Head title="Dishes" />

            <div className="container mt-4">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-header">
                                <h1>Dishes</h1>
                            </div>

                            <div className="card-body">
                                <div>
                                    <button
                                        onClick={() => {
                                            sortHandler("restorant");
                                        }}
                                    >
                                        Item Sort by restorant
                                    </button>
                                    <button
                                        onClick={() => {
                                            sortHandler("price");
                                        }}
                                    >
                                        Item Sort by price
                                    </button>
                                </div>
                                <div>
                                    <label htmlFor="">Search</label>
                                    <input
                                        className="m-3"
                                        type="text"
                                        onChange={searchHandler}
                                    />
                                </div>
                                <ul className="list-group">
                                    {dishes.map(
                                        (dish, i) => (
                                            <li
                                                key={i}
                                                className="list-group-item"
                                            >
                                                <div className="row">
                                                    <div className="col-6">
                                                        <label htmlFor="restorant">
                                                            Restorant
                                                        </label>
                                                        <h2
                                                            className="text-2xl"
                                                            name="restorant"
                                                        >
                                                            {
                                                                dish.restorantTitle
                                                            }
                                                        </h2>
                                                        <label htmlFor="title">
                                                            Title
                                                        </label>
                                                        <h2
                                                            className="text-2xl"
                                                            name="title"
                                                        >
                                                            {dish.title}
                                                        </h2>
                                                        <label htmlFor="price">
                                                            Price
                                                        </label>
                                                        <h2
                                                            className="text-2xl"
                                                            name="price"
                                                        >
                                                            {dish.price} &euro;
                                                        </h2>
                                                    </div>
                                                    <div className="col-6">
                                                        {dish.photo && (
                                                            <div className="w-30 h-30">
                                                                <img
                                                                    className="rounded"
                                                                    src={
                                                                        dish.photo
                                                                    }
                                                                    alt="Dish photo"
                                                                />
                                                            </div>
                                                        )}
                                                    </div>
                                                </div>
                                            </li>
                                        )
                                        // @empty
                                        // <li className="list-group-item">No dishes yet</li>
                                        // @endforelse
                                    )}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </Authenticated>
    );
}
