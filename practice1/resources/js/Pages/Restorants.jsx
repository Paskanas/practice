import React from "react";
import Authenticated from "@/Layouts/Authenticated";
import { Head } from "@inertiajs/inertia-react";

export default function Restorants(props) {
    return (
        <Authenticated
            auth={props.auth}
            errors={props.errors}
            header={
                <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                    Restorants
                </h2>
            }
        >
            <Head title="Restorants" />

            <div className="container mt-4">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-header">
                                <h1 className="text-2xl">Restorants</h1>
                                {/* <div>
            <a className="btn btn-outline-primary m-2" href="{{route('restorant-index', ['sort'=>'asc'])}}">A_Z</a>
          <a className="btn btn-outline-primary m-2" href="{{route('restorant-index', ['sort'=>'desc'])}}">Z_A</a>
          <a className="btn btn-outline-primary m-2" href="{{route('restorant-index')}}">Reset</a>
        </div>  */}
                            </div>

                            <div className="card-body">
                                <ul className="list-group">
                                    {props.restorants ? (
                                        props.restorants.map(
                                            (restorant, i) => (
                                                <li
                                                    key={i}
                                                    className="list-group-item"
                                                >
                                                    <div className="color-bin">
                                                        <label htmlFor="title">
                                                            Title
                                                        </label>
                                                        <h2
                                                            name="title"
                                                            className="text-lg"
                                                        >
                                                            {restorant.title}
                                                        </h2>
                                                        <label htmlFor="city">
                                                            City
                                                        </label>
                                                        <h2
                                                            name="city"
                                                            className="text-lg"
                                                        >
                                                            {restorant.city}
                                                        </h2>
                                                        <label htmlFor="address">
                                                            Address
                                                        </label>
                                                        <h2
                                                            name="address"
                                                            className="text-lg"
                                                        >
                                                            {restorant.address}
                                                        </h2>
                                                        <label htmlFor="working_time">
                                                            Working hours
                                                        </label>
                                                        <h2
                                                            name="working_time"
                                                            className="text-lg"
                                                        >
                                                            {
                                                                restorant.working_time
                                                            }
                                                        </h2>

                                                        {/* <div className="d-flex justify-start">
                                                            <a
                                                                className="btn btn-outline-primary m-2"
                                                                href="{{route('restorants-show', $restorant->id)}}"
                                                            >
                                                                SHOW
                                                            </a>
                                                        </div> */}
                                                    </div>
                                                </li>
                                            )
                                            // @empty
                                            // <li className="list-group-item">No colors, no life in color world</li>
                                            // @endforelse
                                        )
                                    ) : (
                                        <li className="list-group-item">
                                            No colors, no life in color world
                                        </li>
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

/*
const Restorants = ({ restorants }) => {
    return (
        <>
            <div className="container mt-4 w-80">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-header">
                                <h1>Restorants</h1>
                               
                            </div>

                            <div className="card-body">
                                <ul className="list-group">
                                    {restorants.map(
                                        (restorant, i) => (
                                            <li key={i} className="list-group-item">
                                                <div className="color-bin">
                                                    <div className="color-box">
                                                        <h2>
                                                            {restorant.title}
                                                        </h2>
                                                    </div>

                                                    <div className="d-flex justify-start">
                                                        <a
                                                            className="btn btn-outline-primary m-2"
                                                            href="{{route('restorants-show', $restorant->id)}}"
                                                        >
                                                            SHOW
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                        )
                                        // @empty
                                        // <li className="list-group-item">No colors, no life in color world</li>
                                        // @endforelse
                                    )}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
};

export default Restorants;
*/
