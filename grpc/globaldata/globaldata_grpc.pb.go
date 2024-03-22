// Code generated by protoc-gen-go-grpc. DO NOT EDIT.
// versions:
// - protoc-gen-go-grpc v1.2.0
// - protoc             v4.24.0
// source: globaldata.proto

package __

import (
	context "context"
	grpc "google.golang.org/grpc"
	codes "google.golang.org/grpc/codes"
	status "google.golang.org/grpc/status"
)

// This is a compile-time assertion to ensure that this generated file
// is compatible with the grpc package it is being compiled against.
// Requires gRPC-Go v1.32.0 or later.
const _ = grpc.SupportPackageIsVersion7

// GlobalDataServiceClient is the client API for GlobalDataService service.
//
// For semantics around ctx use and closing/ending streaming RPCs, please refer to https://pkg.go.dev/google.golang.org/grpc/?tab=doc#ClientConn.NewStream.
type GlobalDataServiceClient interface {
	GetAllCountry(ctx context.Context, in *EmptyRequest, opts ...grpc.CallOption) (*AllCountryResponse, error)
	GetAllRole(ctx context.Context, in *EmptyRequest, opts ...grpc.CallOption) (*AllRoleResponse, error)
}

type globalDataServiceClient struct {
	cc grpc.ClientConnInterface
}

func NewGlobalDataServiceClient(cc grpc.ClientConnInterface) GlobalDataServiceClient {
	return &globalDataServiceClient{cc}
}

func (c *globalDataServiceClient) GetAllCountry(ctx context.Context, in *EmptyRequest, opts ...grpc.CallOption) (*AllCountryResponse, error) {
	out := new(AllCountryResponse)
	err := c.cc.Invoke(ctx, "/globaldata.GlobalDataService/GetAllCountry", in, out, opts...)
	if err != nil {
		return nil, err
	}
	return out, nil
}

func (c *globalDataServiceClient) GetAllRole(ctx context.Context, in *EmptyRequest, opts ...grpc.CallOption) (*AllRoleResponse, error) {
	out := new(AllRoleResponse)
	err := c.cc.Invoke(ctx, "/globaldata.GlobalDataService/GetAllRole", in, out, opts...)
	if err != nil {
		return nil, err
	}
	return out, nil
}

// GlobalDataServiceServer is the server API for GlobalDataService service.
// All implementations must embed UnimplementedGlobalDataServiceServer
// for forward compatibility
type GlobalDataServiceServer interface {
	GetAllCountry(context.Context, *EmptyRequest) (*AllCountryResponse, error)
	GetAllRole(context.Context, *EmptyRequest) (*AllRoleResponse, error)
	mustEmbedUnimplementedGlobalDataServiceServer()
}

// UnimplementedGlobalDataServiceServer must be embedded to have forward compatible implementations.
type UnimplementedGlobalDataServiceServer struct {
}

func (UnimplementedGlobalDataServiceServer) GetAllCountry(context.Context, *EmptyRequest) (*AllCountryResponse, error) {
	return nil, status.Errorf(codes.Unimplemented, "method GetAllCountry not implemented")
}
func (UnimplementedGlobalDataServiceServer) GetAllRole(context.Context, *EmptyRequest) (*AllRoleResponse, error) {
	return nil, status.Errorf(codes.Unimplemented, "method GetAllRole not implemented")
}
func (UnimplementedGlobalDataServiceServer) mustEmbedUnimplementedGlobalDataServiceServer() {}

// UnsafeGlobalDataServiceServer may be embedded to opt out of forward compatibility for this service.
// Use of this interface is not recommended, as added methods to GlobalDataServiceServer will
// result in compilation errors.
type UnsafeGlobalDataServiceServer interface {
	mustEmbedUnimplementedGlobalDataServiceServer()
}

func RegisterGlobalDataServiceServer(s grpc.ServiceRegistrar, srv GlobalDataServiceServer) {
	s.RegisterService(&GlobalDataService_ServiceDesc, srv)
}

func _GlobalDataService_GetAllCountry_Handler(srv interface{}, ctx context.Context, dec func(interface{}) error, interceptor grpc.UnaryServerInterceptor) (interface{}, error) {
	in := new(EmptyRequest)
	if err := dec(in); err != nil {
		return nil, err
	}
	if interceptor == nil {
		return srv.(GlobalDataServiceServer).GetAllCountry(ctx, in)
	}
	info := &grpc.UnaryServerInfo{
		Server:     srv,
		FullMethod: "/globaldata.GlobalDataService/GetAllCountry",
	}
	handler := func(ctx context.Context, req interface{}) (interface{}, error) {
		return srv.(GlobalDataServiceServer).GetAllCountry(ctx, req.(*EmptyRequest))
	}
	return interceptor(ctx, in, info, handler)
}

func _GlobalDataService_GetAllRole_Handler(srv interface{}, ctx context.Context, dec func(interface{}) error, interceptor grpc.UnaryServerInterceptor) (interface{}, error) {
	in := new(EmptyRequest)
	if err := dec(in); err != nil {
		return nil, err
	}
	if interceptor == nil {
		return srv.(GlobalDataServiceServer).GetAllRole(ctx, in)
	}
	info := &grpc.UnaryServerInfo{
		Server:     srv,
		FullMethod: "/globaldata.GlobalDataService/GetAllRole",
	}
	handler := func(ctx context.Context, req interface{}) (interface{}, error) {
		return srv.(GlobalDataServiceServer).GetAllRole(ctx, req.(*EmptyRequest))
	}
	return interceptor(ctx, in, info, handler)
}

// GlobalDataService_ServiceDesc is the grpc.ServiceDesc for GlobalDataService service.
// It's only intended for direct use with grpc.RegisterService,
// and not to be introspected or modified (even as a copy)
var GlobalDataService_ServiceDesc = grpc.ServiceDesc{
	ServiceName: "globaldata.GlobalDataService",
	HandlerType: (*GlobalDataServiceServer)(nil),
	Methods: []grpc.MethodDesc{
		{
			MethodName: "GetAllCountry",
			Handler:    _GlobalDataService_GetAllCountry_Handler,
		},
		{
			MethodName: "GetAllRole",
			Handler:    _GlobalDataService_GetAllRole_Handler,
		},
	},
	Streams:  []grpc.StreamDesc{},
	Metadata: "globaldata.proto",
}