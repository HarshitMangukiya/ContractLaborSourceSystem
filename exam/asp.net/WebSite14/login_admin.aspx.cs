﻿using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data.SqlClient;
using System.Data;
public partial class register : System.Web.UI.Page
{
    SqlConnection con = new SqlConnection(@"Data Source=.\SQLEXPRESS;AttachDbFilename=D:\asp.net_prectice\WebSite14\App_Data\online.mdf;Integrated Security=True;User Instance=True");
    SqlCommand cmd = new SqlCommand();
    SqlDataAdapter adp = new SqlDataAdapter();
    DataSet ds = new DataSet();
    protected void Page_Load(object sender, EventArgs e)
    {
        if (con.State == ConnectionState.Broken || con.State == ConnectionState.Closed)
        {
            con.Open();
            Response.Write("connction");
        }
    }
    protected void Login1_Authenticate(object sender, AuthenticateEventArgs e)
    {
        SqlCommand cmd = new SqlCommand("StoredProcedure4", con);
        cmd.Parameters.AddWithValue("@var1",Login1.UserName);
        cmd.Parameters.AddWithValue("@var2", Login1.Password);
        cmd.CommandType = CommandType.StoredProcedure;
        SqlDataAdapter adp = new SqlDataAdapter(cmd);
        DataSet ds = new DataSet();
        adp.Fill(ds);
        if (ds.Tables.Count > 0)
        {
            if (ds.Tables[0].Rows.Count > 0)
            {
                Response.Write("login");
                Response.Redirect("view_admin.aspx");
                Session["new1"] = Login1.UserName;
            }

        }
        //Response.Redirect("login.aspx");
    }
}